<?php
class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        try {
            if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
                Flasher::setFlash('BERHASIL', 'ditambahkan', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'ditambahkan', 'danger');
            }
        } catch (Exception $e) {
            Flasher::setFlash('ERROR', 'terjadi kesalahan: ' . $e->getMessage(), 'danger');
        }
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }

    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('BERHASIL', 'dihapus', 'success');
        } else {
            Flasher::setFlash('GAGAL', 'dihapus', 'danger');
        }
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }

    // Fungsi untuk menampilkan form ubah data
    public function getUbah($id)
    {
        $data['judul'] = 'Ubah Data Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/ubah', $data); // Pastikan ada view 'mahasiswa/ubah' untuk form ubah data
        $this->view('templates/footer');
    }


    public function getById($id)
    {
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        echo json_encode($data['mhs']);
    }

    // Fungsi untuk mengubah data mahasiswa
    public function ubah()
    {
        // Ambil ID mahasiswa dari POST
        $id = $_POST['id'];

        // Ambil data mahasiswa yang ada
        $mahasiswaLama = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        // Siapkan data untuk diupdate
        $data = [
            'id' => $id,
            'nama' => $_POST['nama'] ?: $mahasiswaLama['nama'], // Jika tidak diubah, ambil dari data lama
            'nrp' => $_POST['nrp'] ?: $mahasiswaLama['nrp'], // Jika tidak diubah, ambil dari data lama
            'email' => $_POST['email'] ?: $mahasiswaLama['email'], // Jika tidak diubah, ambil dari data lama
            'jurusan' => $_POST['jurusan'] ?: $mahasiswaLama['jurusan'] // Jika tidak diubah, ambil dari data lama
        ];

        try {
            // Menggunakan method ubahDataMahasiswa untuk mengupdate data mahasiswa
            if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($data) > 0) {
                Flasher::setFlash('BERHASIL', 'diubah', 'success');
            } else {
                Flasher::setFlash('GAGAL', 'diubah', 'danger');
            }
        } catch (Exception $e) {
            Flasher::setFlash('ERROR', 'terjadi kesalahan: ' . $e->getMessage(), 'danger');
        }
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;
    }

    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}
