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

        function count_admins() {
                $this->db->select('id');
                $this->db->from('users');
                $this->db->where('role', 0);

                $query = $this->db->get();

                return $query->num_rows();
        }

        function save_existing_user($userId, $username, $password, $role) {
                $data['username'] = $username;
                $data['role'] = $role;

                $password = trim($password);
                if (!empty($password)) {
                        $data['password'] = md5($password);
                }

                $this->db->where('id', $userId);
                if ($this->db->update('users', $data)) {
                        return TRUE;
                }
                return FALSE;
        }
}

