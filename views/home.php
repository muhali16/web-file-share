
<main>
    <h1 style="font-size: xx-large; text-align: center">
        Masukan Nama & File:
    </h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="nama" placeholder="Masukan nama file">
        <label for="files">
            <input type="file" id="files" name="files" required>
        </label>
        <button type="submit" name="send">Kirim</button>
    </form>
    <hr style="border: 2px dot-dash black; margin: 30px">
    <h1 align="center">Data File</h1>
    <table style="margin: auto;">
        <thead style="text-align: center; font-weight: bold">
        <td>#</td>
        <td>Nama File</td>
        <td style="width: 200px">Lokasi</td>
        <td>Action</td>
        </thead>
        <tbody>
        <?php
        $i = 0;
        $data = $db->getAllFrom('files');
        foreach($data as $d) :
            ?>
            <tr>
                <td><?= ++$i ?></td>
                <td><?= $d['nama'] ?><?= $i == 1? ' (latest)':'' ?></td>
                <td><?= $d['lokasi'] ?></td>
                <td>
                    <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/upload-gambar?delete=<?= $d['id'] ?>" onclick="return confirm('Yakin ingin menghapus file ini?')">Delete</a> |
                    <?php //if() ?>
                    <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/upload-gambar/?download=<?= $d['id'] ?>">Download</a> |
                    <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/upload-gambar/?detail=<?= $d['id'] ?>">Detail</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>