<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\PhpWord;

class Word extends CI_Controller
{

    public function print_pengajuan()
    {
        //echo $this->input->post('id_dinas4').'--'.$this->input->post('id_dinas5').'--'.$this->input->post('id_dinas6');
        $get_data = $this->ambil_data($this->input->post('id_download'));
        $get_namadinas = $this->get_dinas($this->input->post('id_download'));

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $template = $phpWord->loadTemplate('template.docx');

        $template->setValue('nama', help_nama_user($get_data->id_user));
        $template->setValue('status', $get_data->status_pemohon);
        $template->setValue('alamat', $get_data->alamat);
        $template->setValue('kategori', help_nama_kategori($get_data->id_kategori));
        $template->setValue('judul_penelitian', $get_data->judul_penelitian);
        $template->setValue('lokasi', $get_data->lokasi);
        $template->setValue('lama_kegiatan', $get_data->lama_kegiatan);
        $template->setValue('jumlah_anggota', $get_data->jumlah_anggota);

        $template->setValue('dinas1', $this->input->post('id_dinas1'));
        $template->setValue('dinas2', $this->input->post('id_dinas2'));
        $template->setValue('dinas3', $this->input->post('id_dinas3'));
        $template->setValue('dinas4', $this->input->post('id_dinas4'));
        $template->setValue('dinas5', $this->input->post('id_dinas5'));
        $template->setValue('dinas6', $this->input->post('id_dinas6'));

        $temp_filename = 'surat-kerja-praktek.docx';
        $template->saveAs($temp_filename);
        echo json_encode($temp_filename);
    }

    private function ambil_data($id)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('pengajuan');
        $this->db->where('id', $id);
        $q = $this->db->get()->row();
        return $q;
    }

    private function get_dinas()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->order_by("id", "asc");
        return $this->db->get('tb_dinas')->result();
    }
}