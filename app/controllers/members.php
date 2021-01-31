<?php

    class members extends ModelConnect
    {
        public function index()
        {
            echo "members";
        }
        public function viewAllMembers()
        {
            $this->Find('members');
        }

        public function AddNewMember()
        {
            $this->Create('members');
        }

        public function getAllMembersCount()
        {

            $this->getCount('members');
        }

        public function DeleteMemberById()
        {
            $this->Delete('members');
        }
    }

?>