<?php
	/**
	 * Project: ContentEditableBundle
	 * File: ContentEditableTest.php
	 * Author: Tomas SYROVY <tomas@syrovy.pro>
	 * Date: 05.06.16
	 * Version: 1.0
	 */

	namespace tomsyrovy\Tests\Entity;

	use tomsyrovy\ContentEditableBundle\Model\ContentEditableInterface;

	class ContentEditableTest extends \PHPUnit_Framework_TestCase {

		public function testUid(){

			$contentEditable = $this->getContentEditable();
			static::assertNull($contentEditable->getUid());

			$contentEditable->setUid(1);
			static::assertEquals(1, $contentEditable->getUid());

		}

		public function testContent(){

			$contentEditable = $this->getContentEditable();
			static::assertNull($contentEditable->getContent());

			$content = '<p>Hello <b>world</b>!</p>';
			$contentEditable->setContent($content);
			static::assertEquals($content, $contentEditable->getContent());

		}

		/**
		 * @return ContentEditableInterface
		 */
		protected function getContentEditable()
		{
			return $this->getMock('\tomsyrovy\ContentEditableBundle\Entity\ContentEditable');
		}

	}