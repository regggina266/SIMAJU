<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\TransaksiBarangModel;
use App\Models\LaporanModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
    protected $TransaksiModel;
    protected $TransaksiBarangModel;
    protected $BarangModel;
    protected $LaporanModel;
    protected $db;

    public function __construct()
    {
        helper('form');
        $this->TransaksiModel = new TransaksiModel();
        $this->TransaksiBarangModel = new TransaksiBarangModel();
        $this->BarangModel = new BarangModel();
        $this->LaporanModel = new LaporanModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['transaksi'] = $this->TransaksiModel->AllData();

        $role = session()->get('level');
        echo view('components/header');
        echo view('components/navbar');
        if ($role == 4) {
            echo view('super_admin/sidebar');
            echo view('admin/laporan', $data);
            echo view('components/js');
        echo view('components/footer');
        } elseif ($role == 3){
            echo view('admin/sidebar');
            echo view('admin/laporan', $data);
            echo view('components/js');
            echo view('components/footer');
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }

    public function filter_laporan()
    {
        $start_date = $this->request->getVar('start_date');
        $end_date = $this->request->getVar('end_date');
        $month = $this->request->getVar('month');
        $year = $this->request->getVar('year');
    
        $builder = $this->TransaksiModel;
    
        if ($start_date && $end_date) {
            $builder = $builder->where('tgl_transaksi >=', $start_date)
                               ->where('tgl_transaksi <=', $end_date);
        } elseif ($month) {
            $builder = $builder->where('MONTH(tgl_transaksi)', date('m', strtotime($month)))
                               ->where('YEAR(tgl_transaksi)', date('Y', strtotime($month)));
        } elseif ($year) {
            $builder = $builder->where('YEAR(tgl_transaksi)', $year);
        }
    
        $data['transaksi'] = $builder->getAllDataWithJoin();
    
        $role = session()->get('level');
        echo view('components/header');
        echo view('components/navbar');
        if ($role == 4) {
            echo view('super_admin/sidebar');
            echo view('admin/detail_laporan', $data);
            echo view('components/js');
            echo view('components/footer');
        } elseif ($role == 3) {
            echo view('admin/sidebar');
            echo view('admin/detail_laporan', $data);
            echo view('components/js');
            echo view('components/footer');
        } else {
            return redirect()->to(base_url('Auth/error'));
        }
    }
    
    public function exportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $transaksi = $this->TransaksiModel->getAllDataWithJoin();

        // Set header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal Transaksi');
        $sheet->setCellValue('C1', 'Nama Pegawai');
        $sheet->setCellValue('D1', 'Nama Pelanggan');
        $sheet->setCellValue('E1', 'Nama Barang');
        $sheet->setCellValue('F1', 'Kode Barang');
        $sheet->setCellValue('G1', 'Kode Warna');
        $sheet->setCellValue('H1', 'Kuantitas');
        $sheet->setCellValue('I1', 'Jenis Barang');
        $sheet->setCellValue('J1', 'Merk');
        $sheet->setCellValue('K1', 'Stok');
        $sheet->setCellValue('L1', 'Harga');
        $sheet->setCellValue('M1', 'Jumlah Produk');
        $sheet->setCellValue('N1', 'Total Pembelian');
        $sheet->setCellValue('O1', 'Jenis Pembayaran');

        // Set data
        $row = 2;
        foreach ($transaksi as $index => $trans) 
        {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $trans['tgl_transaksi']);
            $sheet->setCellValue('C' . $row, $trans['nama']);
            $sheet->setCellValue('D' . $row, $trans['nama_pelanggan']);
            $sheet->setCellValue('E' . $row, $trans['nama_barang']);
            $sheet->setCellValue('F' . $row, $trans['kode_barang']);
            $sheet->setCellValue('G' . $row, $trans['kode_warna']);
            $sheet->setCellValue('H' . $row, $trans['kuantitas']);
            $sheet->setCellValue('I' . $row, $trans['nama_jenis']);
            $sheet->setCellValue('J' . $row, $trans['nama_merk']);
            $sheet->setCellValue('K' . $row, $trans['stok']);
            $sheet->setCellValue('L' . $row, $trans['harga']);
            $sheet->setCellValue('M' . $row, $trans['jumlah_produk']);
            $sheet->setCellValue('N' . $row, $trans['total_harga']);
            $sheet->setCellValue('O' . $row, $trans['jenis_pembayaran']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan Transaksi.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        $writer->save('php://output');
        exit;
    }

    public function exportPDF()
    {
        $dompdf = new Dompdf();
        $data['transaksi'] = $this->TransaksiModel->getAllDataWithJoin();
        $html = view('laporanpdf', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("Laporan Transaksi.pdf", array("Attachment" => 0));
    }
}

