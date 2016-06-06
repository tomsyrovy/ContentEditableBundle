<?php
	/**
	 * Project: ContentEditableBundle
	 * File: ContentEditable.php
	 * Author: Tomas Syrovy <syrovy.tom@gmail.com>
	 * Date: 05.06.16
	 * Version: 1.0
	 */

	namespace tomsyrovy\ContentEditableBundle\Model;

	/**
	 * Class ContentEditable
	 * @package tomsyrovy\ContentEditableBundle\Model
	 */
	abstract class ContentEditable implements ContentEditableInterface {

		/**
		 * @var integer
		 */
		protected $uid;

		/**
		 * @var string
		 */
		protected $content;

		/**
		 * @return int
		 */
		public function getUid(){
			return $this->uid;
		}

		/**
		 * @param int $uid
		 *
		 * @return $this
		 */
		public function setUid( $uid ){
			$this->uid = $uid;
			return $this;
		}

		/**
		 * @return string
		 */
		public function getContent(){
			return $this->content;
		}

		/**
		 * @param string $content
		 *
		 * @return $this
		 */
		public function setContent( $content ){
			$this->content= $content;
			return $this;
		}

	}