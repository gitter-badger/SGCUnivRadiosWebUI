<?php

Class Radio extends CI_Model {
        function get_radio_by_url($radioURL) {
                $this->db->select('title, short_desc, long_desc, url, radio_mountpoint, img_filename');
                $this->db->from('radios');
                $this->db->where('url', $radioURL);
                $this->db->limit(1);

                $query = $this->db->get();

                if ($query->num_rows() == 1) {
                        return $query->result();
                } else {
                        return FALSE;
                }
        }

        function get_all_radios() {
                $this->db->select('title, short_desc, url, radio_mountpoint, img_filename');
                $this->db->from('radios');
                $this->db->order_by('id');

                $query = $this->db->get();

                if ($query->num_rows() >= 1) {
                        return $query->result();
                } else {
                        return FALSE;
                }
        }
}

