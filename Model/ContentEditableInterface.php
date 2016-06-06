<?php
	/**
	 * Project: ContentEditableBundle
	 * File: ContentEditableInterface.php
	 * Author: Tomas Syrovy <syrovy.tom@gmail.com>
	 * Date: 05.06.16
	 * Version: 1.0
	 */

	namespace tomsyrovy\ContentEditableBundle\Model;


	interface ContentEditableInterface {

		/**
		 * @return integer
		 */
		public function getUid();

		/**
		 * @param integer $uid
		 *
		 * @return $this
		 */
		public function setUid($uid);

		/**
		 * @return string
		 */
		public function getContent();

		/**
		 * @param string $content
		 *
		 * @return $this
		 */
		public function setContent($content);

	}