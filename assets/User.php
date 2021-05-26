<?php
	class User {
//		define attributes in the class
		private int $userID;
		private string $firstName;
		private string $lastName;
		private string $degree;

//		setter function
		public function createUser($userID,$fName,$lName,$degree): User {
			$this->userID=$userID;
			$this->firstName=$fName;
			$this->lastName=$lName;
			$this->degree=$degree;
			return $this;
		}

//		getter functions
		public function getUserID(): int {
			return $this->userID;
		}

		public function getFirstName(): string {
			return $this->firstName;
		}

		public function getLastName(): string {
			return $this->lastName;
		}

		public function isCS(): bool {
			if($this->degree=='CS')
				return true;
			else
				return false;
		}

	}
