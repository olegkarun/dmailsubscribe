<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Björn Fromme <fromme@dreipunktnull.come>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
class Tx_Dmailsubscribe_Domain_Model_Subscription extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * @var string
	 * @validate emailAddress
	 */
	protected $email;

	/**
	 * @var string
	 */
	protected $gender;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $company;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Dmailsubscribe_Domain_Model_Category>
	 */
	protected $categories;

	/**
	 * @var boolean
	 */
	protected $receiveHtml;

	/**
	 * @var boolean
	 */
	protected $hidden;

	public function __construct() {
		$this->categories = new Tx_Extbase_Persistence_ObjectStorage();
		$this->receiveHtml = TRUE;
		$this->hidden = TRUE;
	}

	/**
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $gender
	 * @return void
	 */
	public function setGender($gender) {
		$this->gender = $gender;
	}

	/**
	 * @return string
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $company
	 * @return void
	 */
	public function setCompany($company) {
		$this->company = $company;
	}

	/**
	 * @return string
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Dmailsubscribe_Domain_Model_Category> $categories
	 * @return void
	 */
	public function setCategories($categories) {
		$this->categories = $categories;
	}

	/**
	 * @param Tx_Dmailsubscribe_Domain_Model_Category $category
	 * @return void
	 */
	public function addCategory(Tx_Dmailsubscribe_Domain_Model_Category $category) {
		$this->categories->attach($category);
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Dmailsubscribe_Domain_Model_Category>
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * @param boolean $receiveHtml
	 * @return void
	 */
	public function setReceiveHtml($receiveHtml) {
		$this->receiveHtml = (boolean) $receiveHtml;
	}

	/**
	 * @return boolean
	 */
	public function getReceiveHtml() {
		return (boolean) $this->receiveHtml;
	}

	/**
	 * @param boolean $hidden
	 * @return void
	 */
	public function setHidden($hidden) {
		$this->hidden = (boolean) $hidden;
	}

	/**
	 * @return boolean
	 */
	public function getHidden() {
		return (boolean) $this->hidden;
	}

}