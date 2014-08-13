<?php

Class User extends CI_Model {
        function login($username, $password) {
                $this->db->select('id, username, password');
                $this->db->from('users');
                $this->db->where('username', $username);
                $this->db->where('password', md5($password));
                $this->db->limit(1);

                $query = $this->db->get();

                if ($query->num_rows() == 1) {
                        return $query->result();
                } else {
                        return FALSE;
                }
        }

        function get_user_by_id($userId) {
                $this->db->select('username, role');
                $this->db->from('users');
                $this->db->where('id', $userId);
                $this->db->limit(1);

                $query = $this->db->get();

                if ($query->num_rows() == 1) {
                        return $query->result();
                } else {
                        return FALSE;
                }
        }

        function get_user_role($username) {
                $this->db->select('role');
                $this->db->from('users');
                $this->db->where('username', $username);
                $this->db->limit(1);

                $query = $this->db->get();

                if ($query->num_rows() == 1) {
                        return $query->result();
                } else {
                        return FALSE;
                }
        }

        function get_all_users() {
                $this->db->select('id, username, role, creation_ts');
                $this->db->from('users');

                $query = $this->db->get();

                if ($query->num_rows() >= 1) {
                        return $query->result();
                } else {
                        return FALSE;
                }
        }
}

