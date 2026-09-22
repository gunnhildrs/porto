<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    /**
     * Tampilkan halaman portofolio.
     * Semua konten disuplai sebagai array PHP statis — tidak ada
     * query database, migration, ataupun model di controller ini.
     */
    public function index()
    {
        $profile = [
            'name'        => 'Ahmad Irsyad Rosyadi',
            'title'       => 'Software Developer — Security-Focused Full Stack',
            'location'    => 'Bogor, Jawa Barat',
            'email'       => 'irsydrsydi@gmail.com',
            'github'      => 'https://github.com/gunnhildrs',
            'githubLabel' => 'github.com/gunnhildrs',
            'oldPortfolio'=> 'https://gunnhildrs.github.io/Portofolio/',
        ];

        $facts = [
            ['label' => 'Lokasi', 'value' => 'Bogor, Jawa Barat'],
            ['label' => 'Status', 'value' => 'Fresh Graduate 2026'],
            ['label' => 'IPK',    'value' => '3.75 / 4.00'],
            ['label' => 'Fokus',  'value' => 'Keamanan & Full Stack'],
        ];

        $about = [
            'heading' => 'Suka membangun sesuatu sampai benar-benar teruji',
            'paragraphs' => [
                'Ketertarikan saya pada keamanan sistem tumbuh saat menyusun tugas akhir: bagaimana satu QR code bisa menyimpan data rahasia, membuktikan keasliannya sendiri, sekaligus tetap terlihat seperti QR code biasa. Pertanyaan itu yang membawa saya membangun OurTicket dari nol sebagai lulusan Teknik Informatika, Universitas Indraprasta PGRI — bukan sekadar menerapkan rumus dari buku, tapi merancang sendiri tiap lapisan keamanannya.',
                'Di luar riset keamanan, saya senang mengerjakan sesuatu sampai tuntas — dari rancangan antarmuka sampai struktur basis data. Sebagai fresh graduate, saya mencari tim tempat saya bisa terus belajar sambil membawa cara kerja yang saya bangun selama kuliah: memastikan sesuatu berfungsi bukan cuma sekali, tapi juga saat benar-benar diuji.',
            ],
        ];

        $specializations = [
            [
                'tag'   => 'AES-256-GCM',
                'title' => 'Enkripsi data',
                'body'  => 'Mengenkripsi payload sensitif dengan mode autentikasi terintegrasi, menjamin kerahasiaan sekaligus integritas data di dalam satu operasi.',
            ],
            [
                'tag'   => 'ECDSA · secp256r1',
                'title' => 'Tanda tangan digital',
                'body'  => 'Menerapkan skema tanda tangan kurva eliptik (NIST P-256) sehingga setiap tiket punya bukti keaslian yang tidak bisa disangkal penerbitnya.',
            ],
            [
                'tag'   => 'LSB Steganografi',
                'title' => 'Penyembunyian data',
                'body'  => 'Membangun sendiri proses pembuatan QR code dari algoritma dasar — bukan memakai pustaka QR generator siap pakai — lalu menyisipkan data terenkripsi ke bit-bit terakhir piksel.',
            ],
            [
                'tag'   => 'Nonce + HMAC-SHA256',
                'title' => 'Anti-replay',
                'body'  => 'Menambahkan nonce dan timestamp pada setiap payload untuk mencegah tiket yang sama dipindai atau dipakai ulang secara curang.',
            ],
        ];

        $featuredProject = [
            'name'  => 'OurTicket',
            'role'  => 'Tugas akhir. Dirancang dan dibangun sendiri dari nol menggunakan PHP, 2025–2026.',
            'badge' => 'E-TICKETING SECURITY',
            'problem' => 'Tiket digital berbasis QR mudah diduplikasi atau dipalsukan bila kodenya hanya menyimpan data polos tanpa lapisan verifikasi.',
            'solution' => 'Sistem e-ticketing di mana setiap QR code dibangun sendiri lalu membawa data terenkripsi, bertanda tangan digital, dan disembunyikan melalui steganografi.',
            'architecture' => [
                'QR code dibangun sendiri dari algoritma dasar — bukan menggunakan pustaka QR generator siap pakai',
                'QR Code versi 10, error correction level M',
                'Steganografi LSB 2-bit di kanal RGB',
                'Payload 120-byte: nonce, timestamp, HMAC-SHA256, tanda tangan ECDSA',
                'Integrasi pembayaran QRIS via Midtrans',
                '5 halaman laporan admin dengan ekspor CSV/PDF',
                'Pipeline pembuatan e-tiket PDF otomatis',
            ],
            'stack' => ['PHP', 'AES-256', 'ECDSA P-256', 'LSB Steganography', 'Midtrans QRIS'],
            'result' => 'Kualitas citra QR hasil penyisipan data diuji dengan PSNR, mencapai ~47,46 dB — perubahan piksel tidak kasat mata namun tetap bisa dipindai secara normal.',
            'video' => 'https://youtu.be/-yiVfo2qHEk?si=a1ds0WFKegNP-yh2',
        ];

        $secondaryProject = [
            'name' => 'Tiara School — Aplikasi Administrasi',
            'role' => 'Pengembang tunggal, full stack. Dibangun dengan Java.',
            'body' => 'Aplikasi administrasi untuk SD Swasta Tiara School, dikembangkan dari perancangan basis data, logika bisnis, hingga antarmuka pengguna dalam satu siklus pengembangan penuh.',
            'stack' => ['Java', 'MySQL', 'Desktop App'],
            'note' => 'Mengelola data siswa dan nilai, dibangun sebagai syarat kelulusan yang menuntut penguasaan siklus pengembangan penuh — dari desain sistem sampai rilis.',
            'video' => 'https://youtu.be/snCtvcUkfpo?si=xJoqIR74dkqGcnTs',
        ];

        $skillGroups = [
            [
                'title' => 'Bahasa & Framework',
                'items' => ['Java', 'PHP · Laravel', 'HTML, CSS, JavaScript'],
            ],
            [
                'title' => 'Keamanan & Kriptografi',
                'items' => ['AES-256 (CBC/GCM)', 'ECDSA (secp256r1)', 'Steganografi LSB', 'HMAC-SHA256'],
            ],
            [
                'title' => 'Tools & Integrasi',
                'items' => ['MySQL', 'XAMPP / Laragon', 'Midtrans QRIS API', 'n8n (workflow automation)'],
            ],
        ];

        $orgExperience = [
            'mark'  => 'KARANG TARUNA RW',
            'title' => 'Wakil Ketua Pelaksana, HUT RI',
            'body'  => 'Memimpin koordinasi panitia tingkat RW untuk penyelenggaraan peringatan HUT RI, dari perencanaan acara hingga pelaksanaan di lapangan.',
            'timeline' => [
                ['date' => '17 Agustus', 'desc' => 'karnaval dan lomba'],
                ['date' => '28 Agustus', 'desc' => 'malam puncak/pentas seni, lomba qosidah marawis hadroh'],
                ['date' => '29 Agustus', 'desc' => 'konser musik hingga pentas seni'],
            ],
        ];

        return view('portfolio', compact(
            'profile',
            'facts',
            'about',
            'specializations',
            'featuredProject',
            'secondaryProject',
            'skillGroups',
            'orgExperience'
        ));
    }
}
