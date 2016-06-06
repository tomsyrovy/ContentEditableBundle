<?php
	/**
	 * Project: ContentEditableBundle
	 * File: ContentEditable.php
	 * Author: Tomas SYROVY <tomas@syrovy.pro>
	 * Date: 05.06.16
	 * Version: 1.0
	 */

	namespace tomsyrovy\ContentEditableBundle\Entity;

	use tomsyrovy\ContentEditableBundle\Model\ContentEditable as BaseContentEditable;
	use Doctrine\ORM\Mapping as ORM;


	/**
	 * @ORM\Entity
	 * @ORM\Table(name="content_editable")
	 */
	class ContentEditable extends BaseContentEditable{

		/**
		 * @var integer
		 *
		 * @ORM\Id()
		 * @ORM\GeneratedValue(strategy="auto")
		 * @ORM\Column(type="integer")
		 */
		protected $id;

		/**
		 * @var
		 * @ORM\Column(type="integer", unique=true)
		 */
		protected $uid;

		/**
		 * @var
		 * @ORM\Column(type="text")
		 */
		protected $content;

		public function getId(){
			return $this->id;
		}


	}