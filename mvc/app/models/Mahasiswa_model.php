<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database; // Menggunakan Database tanpa tanda kurung
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultset(); // Menggunakan resultset() sesuai dengan kode yang diinginkan
    }

    public function getMahasiswaById($id) // Menambahkan parameter $id
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id'); // Menambahkan spasi
        $this->db->bind('id', $id);
        return $this->db->single();
    }


    public function tambahDataMahasiswa($data)
    {
        if (!isset($_POST['nama'], $_POST['nrp'], $_POST['email'], $_POST['jurusan'])) {
            Flasher::setFlash('GAGAL', 'ditambahkan, data tidak lengkap', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }

        $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan) 
                  VALUES (:nama, :nrp, :email, :jurusan)"; // Menyertakan nama kolom

        $this->db->query($query);
        $this->db->bind("nama", $data["nama"]);
        $this->db->bind("nrp", $data["nrp"]);
        $this->db->bind("email", $data["email"]);
        $this->db->bind("jurusan", $data["jurusan"]);


        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        // SQL query untuk mengupdate data mahasiswa berdasarkan ID
        $query = "UPDATE mahasiswa SET 
                nama = :nama,
                nrp = :nrp,
                email = :email,
                jurusan = :jurusan
              WHERE id = :id";

        // Persiapkan statement
        $this->db->query($query);

        // Bind data untuk mencegah SQL Injection
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        // Eksekusi query dan return hasilnya
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama Like :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultset();
    }
}
