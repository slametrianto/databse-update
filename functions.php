<?php

//koneksi database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


//functions query

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {

        $rows[] = $row;
    }

    return $rows;
}


function tambah($data)
{

    global $conn;

    //ambil data dari tiap elemen dalam form
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    //query insert data
    $query = "INSERT INTO mahasiswa
     VALUES ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')";




    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id)
{

    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    global $conn;

    //ambil data dari tiap elemen dalam form
    $id = $data["id"];

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    //query update data
    $query = "UPDATE mahasiswa SET 
    nrp = '$nrp', 
    nama = '$nama',
    email = '$email',
    jurusan ='$jurusan',
    gambar = '$gambar'
    WHERE id = $id
    ";



    mysqli_query($conn, $query);

    //kembalikan ketika sudah trupdate databaseny
    return mysqli_affected_rows($conn);
}
