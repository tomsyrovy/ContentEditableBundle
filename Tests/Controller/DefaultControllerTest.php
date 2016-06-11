<?php
	/**
	 * Project: ContentEditableBundle
	 * File: DefaultControllerTest.php
	 * Author: Tomas SYROVY <tomas@syrovy.pro>
	 * Date: 06.06.16
	 * Version: 1.0
	 */

	namespace tomsyrovy\Tests\Controller;

	use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
	use Symfony\Component\HttpFoundation\JsonResponse;
	use tomsyrovy\ContentEditableBundle\Controller\DefaultController;
	use tomsyrovy\ContentEditableBundle\Entity\ContentEditable;

	class DefaultControllerTest extends KernelTestCase {

		/**
		 * @var \Doctrine\ORM\EntityManager
		 */
		private $em;

		/**
		 * @var DefaultController
		 */
		private $controller;

		/**
		 * {@inheritDoc}
		 */
		protected function setUp()
		{
			self::bootKernel();

			$this->em = static::$kernel->getContainer()->get('doctrine')->getManager();
			$this->controller = new DefaultController();

			$content = '<p><b>Hello</b>, world!</p>';

			// First, mock the object to be used in the test
			$contentEditable =
				$this
					->getMock(ContentEditable::class)
					->expects(static::once())
					->method('getContent')
					->willReturn($content)
					->method('getUid')
					->willReturn(1);

			// Now, mock the repository so it returns the mock of the entity
			$contentEditableRepository =
				$this
					->getMockBuilder(ContentEditableRepository::class)
					->disableOriginalConstructor()
					->getMock()
					->expects(self::once())
					->method('find')
					->will(self::returnValue($contentEditable));

			// Last, mock the EntityManager to return the mock of the repository
			$entityManager =
				$this
					->getMockBuilder(ObjectManager::class)
					->disableOriginalConstructor()
					->getMock()
					->expects(self::once())
					->method('getRepository')
					->will(self::returnValue($contentEditableRepository));
		}

		public function testLoadAction(){

			/** @var ContentEditable $contentEditable */
			$contentEditable = $this->em->getRepository('ContentEditableBundle:ContentEditable')->findOneBy([], ['id' => 'DESC']);
			if($contentEditable){

				$contentEditable_id = $contentEditable->getId();
				$response = $this->controller->loadAction($contentEditable_id);
				static::assertInstanceOf(JsonResponse::class, $response);

				$contentEditable_id++; //non-existed id
				$response = $this->controller->loadAction($contentEditable_id);
				static::assertNull($response);

			}

		}

		public function testSaveAction(){

			/** @var ContentEditable $contentEditable */
			$contentEditable = $this->em->getRepository('ContentEditableBundle:ContentEditable')->findOneBy([], ['id' => 'DESC']);
			if($contentEditable){

				$contentEditable_id = $contentEditable->getId();
				$newContent = serialize([
					"content" => "New data",
				]);
				$response = $this->controller->saveAction($contentEditable_id, $newContent);
				static::assertInstanceOf(JsonResponse::class, $response);

				$contentEditable = $this->em->getRepository('ContentEditableBundle:ContentEditable')->find($contentEditable_id);
				static::assertEquals($newContent, $contentEditable->getContent());

			}

		}

		/**
		 * {@inheritDoc}
		 */
		protected function tearDown()
		{
			parent::tearDown();

			$this->em->close();
			$this->em = null; // avoid memory leaks
		}

	}