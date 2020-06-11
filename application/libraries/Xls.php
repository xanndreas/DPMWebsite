<?php

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls as WriterXls;

class Xls
{
    public function export_xls($data, $type)
    {
        $spreadsheet = new Spreadsheet();
        //setting properties file
        $spreadsheet->getProperties()->setCreator('Dewan Pewakilan Mahasiswa Politeknik Negeri Malang')
            ->setLastModifiedBy('Admin')
            ->setTitle('Office 2007 XLSX Test Document')
            ->setSubject('Office 2007 XLSX Test Document')
            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
            ->setKeywords('office 2007 openxml php')
            ->setCategory('Test result file');

        if ($type == 'aspirasi') {
            $spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth("20");
            $spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth("18");
            $spreadsheet->getActiveSheet()->getColumnDimension("D")->setAutoSize('30');
            $spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("F")->setAutoSize('30');
            $spreadsheet->getActiveSheet()->getColumnDimension("G")->setAutoSize('30');
            $spreadsheet->getActiveSheet()->getRowDimension("1")->setRowHeight('20');
            //setting nama kolom
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nomor')
                ->setCellValue('B1', 'Nama')
                ->setCellValue('C1', 'Kategori')
                ->setCellValue('D1', 'OKI')
                ->setCellValue('E1', 'TUJUAN')
                ->setCellValue('F1', 'Isi Aspirasi')
                ->setCellValue('G1', 'Tanggal');

            //setting isi kolom
            $kolom = 2;
            $nomor = 1;

            foreach ($data as $keys) {
                foreach ($keys as $key) {
                    foreach ($key as $ke) {
                        $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $kolom, $nomor)
                            ->setCellValue('B' . $kolom, $ke["NAMA"])
                            ->setCellValue('C' . $kolom, $ke["KAT_NAMA"])
                            ->setCellValue('D' . $kolom, $ke["OKI_NAMA"])
                            ->setCellValue('E' . $kolom, $ke["TUJUAN"])
                            ->setCellValue('F' . $kolom, $ke["KONTEN"])
                            ->setCellValue('G' . $kolom, $ke["DATE"]);
                        $kolom++;
                        $nomor++;
                    }
                }
            }
            $filename = "Aspirasi " . date("Y-m-d H:i:s");
        } else if ($type == 'saran') {
            $spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth("20");
            $spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth("18");
            $spreadsheet->getActiveSheet()->getColumnDimension("D")->setAutoSize('30');
            $spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth('20');
            $spreadsheet->getActiveSheet()->getRowDimension("1")->setRowHeight('20');

            //setting nama kolom
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nomor')
                ->setCellValue('B1', 'Nama')
                ->setCellValue('C1', 'NIM')
                ->setCellValue('D1', 'Saran')
                ->setCellValue('E1', 'Tanggal');
            $kolom = 2;
            $nomor = 1;
            foreach ($data as $keys) {
                foreach ($keys as $key) {
                    foreach ($key as $ke) {
                        $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $kolom, $nomor)
                            ->setCellValue('B' . $kolom, $ke["NAMA"])
                            ->setCellValue('C' . $kolom, $ke["NIM"])
                            ->setCellValue('D' . $kolom, $ke["SARAN"])
                            ->setCellValue('E' . $kolom, $ke["DATE"]);
                        $kolom++;
                        $nomor++;
                    }
                }
            }
            $filename = "Saran " . date("Y-m-d H:i:s");
        } else if ($type == "barang") {
            $spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth("18");
            $spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth("18");
            $spreadsheet->getActiveSheet()->getColumnDimension("D")->setWidth("18");
            $spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth("18");
            $spreadsheet->getActiveSheet()->getColumnDimension("F")->setWidth("18");
            $spreadsheet->getActiveSheet()->getColumnDimension("G")->setWidth("18");
            $spreadsheet->getActiveSheet()->getColumnDimension("H")->setWidth("18");
            //setting nama kolom
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Nomor')
                ->setCellValue('B1', 'Nama Peminjam')
                ->setCellValue('C1', 'Nama Organisasi')
                ->setCellValue('D1', 'Tanggal Plot')
                ->setCellValue('E1', 'Tanggal Peminjaman')
                ->setCellValue('F1', 'Tanggal Pengambilan')
                ->setCellValue('G1', 'Keperluan')
                ->setCellValue('H1', 'Jaminan')
                ->setCellValue('I1', 'Status');

            $kolom = 2;
            $nomor = 1;
            foreach ($data as $keys) {
                foreach ($keys as $key) {
                    foreach ($key as $ke) {
                        $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $kolom, $nomor)
                            ->setCellValue('B' . $kolom, $ke["NAMA_PEMINJAM"])
                            ->setCellValue('C' . $kolom, $ke["NAMA_ORGANISASI"])
                            ->setCellValue('D' . $kolom, $ke["TANGGAL_PLOT"])
                            ->setCellValue('E' . $kolom, $ke["TANGGAL_PEMINJAMAN"])
                            ->setCellValue('F' . $kolom, $ke["TANGGAL_PENGEMBALIAN"])
                            ->setCellValue('G' . $kolom, $ke["UNTUK_KEPERLUAN"])
                            ->setCellValue('H' . $kolom, $ke["JAMINAN"])
                            ->setCellValue('I' . $kolom, $ke["STATUS"]);

                        $kolom++;
                        $nomor++;
                    }
                }
            }
            $filename = "Barang Pinjaman " . date("Y-m-d H:i:s");
        } elseif ($type == 'kategori') {
            $spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth("20");
            $spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth("18");
            $spreadsheet->getActiveSheet()->getColumnDimension("D")->setAutoSize('30');
            $spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("F")->setAutoSize('30');
            $spreadsheet->getActiveSheet()->getRowDimension("1")->setRowHeight('20');
            //setting nama kolom
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'No.')
                ->setCellValue('B1', 'NIM')
                ->setCellValue('C1', 'Kategori')
                ->setCellValue('D1', 'Asal Organisasi')
                ->setCellValue('E1', 'Isi Aspirasi')
                ->setCellValue('F1', 'Tanggal');

            //setting isi kolom
            $kolom = 2;
            $nomor = 1;

            foreach ($data as $keys) {
                foreach ($keys as $key) {
                    foreach ($key as $ke) {
                        $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $kolom, $nomor)
                            ->setCellValue('B' . $kolom, $ke["NIM"])
                            ->setCellValue('C' . $kolom, $ke["KAT_NAMA"])
                            ->setCellValue('D' . $kolom, $ke["OKI_NAMA"])
                            ->setCellValue('E' . $kolom, $ke["KONTEN"])
                            ->setCellValue('F' . $kolom, $ke["DATE"]);
                        $kolom++;
                        $nomor++;
                    }
                }
            }
            $filename = "Kategori " . date("Y-m-d H:i:s");
        } elseif ($type == 'prodi') {
            $spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth("20");
            $spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth("18");
            $spreadsheet->getActiveSheet()->getColumnDimension("D")->setAutoSize('30');
            $spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth('20');
            $spreadsheet->getActiveSheet()->getRowDimension("1")->setRowHeight('20');
            //setting nama kolom
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'No.')
                ->setCellValue('B1', 'NIM')
                ->setCellValue('C1', 'Kategori')
                ->setCellValue('D1', 'Isi Aspirasi')
                ->setCellValue('E1', 'Tanggal');

            //setting isi kolom
            $kolom = 2;
            $nomor = 1;

            foreach ($data as $keys) {
                foreach ($keys as $ke) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, $ke["NIM"])
                        ->setCellValue('C' . $kolom, $ke["KAT_NAMA"])
                        ->setCellValue('D' . $kolom, $ke["KONTEN"])
                        ->setCellValue('E' . $kolom, $ke["DATE"]);
                    $kolom++;
                    $nomor++;
                }
            }
            $filename = "Prodi " . date("Y-m-d H:i:s");
        } elseif ($type == 'oprec') {
            $spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth("20");
            $spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth("18");
            $spreadsheet->getActiveSheet()->getColumnDimension("D")->setAutoSize('30');
            $spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("F")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("G")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("H")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("I")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("J")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("K")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("L")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("M")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("N")->setWidth('20');
            $spreadsheet->getActiveSheet()->getColumnDimension("O")->setWidth('20');
            $spreadsheet->getActiveSheet()->getRowDimension("1")->setRowHeight('20');
            //setting nama kolom
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A1', 'No.')
                ->setCellValue('B1', 'NIM')
                ->setCellValue('C1', 'Nama')
                ->setCellValue('D1', 'TTL')
                ->setCellValue('E1', 'Jurusan')
                ->setCellValue('F1', 'Prodi')
                ->setCellValue('G1', 'Asal')
                ->setCellValue('H1', 'Kos')
                ->setCellValue('I1', 'Motivasi')
                ->setCellValue('J1', 'Kelebihan')
                ->setCellValue('K1', 'Kekurangan')
                ->setCellValue('L1', 'Alasan')
                ->setCellValue('M1', 'Prestasi')
                ->setCellValue('N1', 'Foto')
                ->setCellValue('O1', 'Date');

            //setting isi kolom
            $kolom = 2;
            $nomor = 1;

            foreach ($data as $keys) {
                foreach ($keys as $key) {
                    foreach ($key as $ke) {
                        $spreadsheet->setActiveSheetIndex(0)
                            ->setCellValue('A' . $kolom, $nomor)
                            ->setCellValue('B' . $kolom, $ke["nim"])
                            ->setCellValue('C' . $kolom, $ke["nama"])
                            ->setCellValue('D' . $kolom, $ke["ttl"])
                            ->setCellValue('E' . $kolom, $ke["jurusan"])
                            ->setCellValue('F' . $kolom, $ke["prodi"])
                            ->setCellValue('G' . $kolom, $ke["alamat_asal"])
                            ->setCellValue('H' . $kolom, $ke["alamat_kos"])
                            ->setCellValue('I' . $kolom, $ke["motivasi"])
                            ->setCellValue('J' . $kolom, $ke["kelebihan"])
                            ->setCellValue('K' . $kolom, $ke["kekurangan"])
                            ->setCellValue('L' . $kolom, $ke["alasan"])
                            ->setCellValue('M' . $kolom, $ke["prestasi"])
                            ->setCellValue('N' . $kolom, $ke["foto"])
                            ->setCellValue('O' . $kolom, $ke["date"]);
                        $kolom++;
                        $nomor++;
                    }
                }
            }
            $filename = "Oprec " . date("Y-m-d H:i:s");
        }


        $writer = new WriterXls($spreadsheet);
        ob_end_clean();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
        header('Cache-Control: max-age=0');
        // //export
        $writer->save('php://output');
    }
}
