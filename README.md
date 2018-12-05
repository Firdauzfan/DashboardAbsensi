This Repo for integrating Face Recognition and Ijin Absensi Bot in Dashboard

## Howto:
    Tambahkan pada crontab -e linux untuk Mengirim Foto/Gambar dan lampiran:
    */1 * * * * /usr/bin/rsync -a ~/Documents/firdauzfanani/FaceRecognition/hasil_absensi/ /var/www/html/DashboardAbsensi/hasil_absensi
    */1 * * * * /usr/bin/rsync -a ~/Documents/firdauzfanani/FaceRecognition/hasil_keamanan/ /var/www/html/DashboardAbsensi/hasil_keamanan
    */1 * * * * /usr/bin/rsync -a ~/Documents/firdauzfanani/VIO_IjinAbsensi/Lampiran/ /var/www/html/DashboardAbsensi/Lampiran
