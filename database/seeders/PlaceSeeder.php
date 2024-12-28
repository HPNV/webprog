<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Place::factory()->count(10)->create();

        Place::create([
            'placeId' => Str::uuid(),
            'name' => "Taman Nasional Way Kambas",
            'imagePath' => 'https://lh3.googleusercontent.com/p/AF1QipPpx9jCsqxFduqY9SlpsDGVo1GNeXk9KAaKyq8O=s294-w294-h220-k-no',
            'rating' => '4.3',
            'email' => 'tamannasional@gmail.com',
            'phone' => '08123456789',
            'galleryImages' => [
                'https://lh3.googleusercontent.com/p/AF1QipNHDJsOCLlhRfFAquNPat2ZxQYEL2dVmHFr4jmr=s294-w294-h220-k-no',
                'https://cdn.idntimes.com/content-images/post/20181224/taman-nasional-way-kambas-b24de22cd86f7678c85137ec98f65cce_600x400.jpg',
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaO1sRZ7Xfogl2HalmHt1kmZsnB0eUIW7SxA&s',
            ],
            'description' => "Taman Nasional Way Kambas (TNWK) adalah taman nasional perlindungan gajah yang terletak di daerah Lampung tepatnya di Kecamatan Labuhan Ratu, Lampung Timur, Indonesia.",
            'address' => "Lampung Timur, Lampung, Indonesia",
        ]);

        Place::create([
            'placeId' => Str::uuid(),
            'name' => "Labengki Island",
            'imagePath' => 'https://blog-static.mamikos.com/wp-content/uploads/2019/10/Pulau-Labengki.jpg',
            'rating' => '4.3',
            'email' => 'lebengkiisland@gmail.com',
            'phone' => '08123456789',
            'galleryImages' => [
                'https://www.citilink.co.id/uploads/44b1fa5f-28f3-4d8c-8d0b-4b93cb980b56/shutterstock_1213360378_624x497.jpg',
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhm4u6cHJtDtRKsrdQlvk9lqHp2ZvU9aBEqQ&s',
                'https://kopisetara.com/web/image/6800/61.jpg?access_token=8ec90a8c-e55b-4c5a-ad2d-b70828b76914',
            ],
            'description' => "Pulau Labengki atau di Indonesia menyebutnya Pulau Labengki adalah surga baru tujuan wisata alam di Propinsi Sulawesi Tenggara. Pulau Labengki terletak di Konawe Utara, di Teluk Lasolo, Kecamatan Lasolo, Sulawesi Tenggara, Indonesia. Pulau Labengki menawarkan panorama eksotis yang nyata, tenang dan alami. Pulau Labengki dikelilingi oleh bukit berbatu hijau dan memiliki keanekaragaman hayati bawah laut yang sangat indah. Di salah satu sudut pegunungan batu ada beberapa jenis anggrek yang tumbuh secara alami sehingga dapat dikatakan kawasan Pulau Labengki adalah sangat ideal dan cocok menjadi tujuan wisata bahari di Indonesia khususnya di Sulawesi Tenggara.",
            'address' => "Konawe Utara, di Teluk Lasolo, Kecamatan Lasolo, Sulawesi Tenggara, Indonesia",
        ]);

        Place::create([
            'placeId' => Str::uuid(),
            'name' => "Gili Trawangan",
            'imagePath' => 'https://www.gotravelaindonesia.com/wp-content/uploads/Alasan-Mengunjungi-Gili-Trawangan.jpg',
            'rating' => '4.5',
            'email' => 'tarawangan@gmail.com',
            'phone' => '08123456789',
            'galleryImages' => [
                'https://torch.id/cdn/shop/articles/Hero_Banner.webp?v=1710835467&width=1100',
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8GecCc_dTsXAeVQxcrzXH9witEQbmgWGsPA&s',
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTI5y29KZxmLUXSWb-1aTq-EZ7TInhSkZoGYA&s',
            ],
            'description' => "Gili Trawangan adalah salah satu dari Tiga Gili yang ada di bagian barat laut Pulau Lombok, bersama dengan Gili Air dan Gili Meno atau yang juga disebut sebagai Pesona Gili Tramena (Trawangan, Meno, dan Air). Gili Trawangan menjadi salah satu daerah wisata yang populer di Indonesia.[3][4] Salah satu daya tarik utama dari Gili Trawangan adalah aturan bebas polusinya, yaitu tidak ada kendaraan bermotor yang diizinkan untuk beroperasi di pulau ini.[5] Alat transportasi yang dapat digunakan di pulau ini adalah sepeda atau cidomo.",
            'address' => "Kabupaten Lombok Utara, Nusa Tenggara Barat",
        ]);

        Place::create([
            'placeId' => Str::uuid(),
            'name' => "Belitung Island",
            'imagePath' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOyFNQ1pdCfzigB53KLSQiwS5sEQGz6YxdlQ&s',
            'rating' => '4.5',
            'email' => 'belitungisland@gmail.com',
            'phone' => '08123456789',
            'galleryImages' => [
                'https://asset-2.tstatic.net/belitung/foto/bank/images/20220824-wisata-belitung-pulau-memperak.jpg',
                'https://images.trvl-media.com/lodging/50000000/49150000/49146900/49146846/437e20b0.jpg?impolicy=fcrop&w=357&h=201&p=1&q=medium',
                'https://www.indonesia.travel/content/dam/indtravelrevamp/en/news/selamat-geopark-belitung-resmi-diakui-sebagai-unesco-global-geopark/belitung.jpg',
            ],
            'description' => "Meskipun tidak sepopuler Bali atau Lombok, Belitung mempunyai beberapa pantai terbaik di Indonesia. Pasirnya lembut dan seputih gula aren, bahkan ada yang mengatakan bahwa pasir di sini lebih putih daripada pasir di Bali. Belitung juga dikelilingi oleh lebih dari 100 pulau kecil. Hampir semuanya dihiasi dengan pasir putih dan bebatuan granit, dan hanya sedikit yang berpenghuni. Salah satu pulau khususnya, Pulau Lengkuas merupakan tempat berdirinya mercusuar antik dari abad ke-19. Mercusuar ini dibangun pada masa kolonial Belanda dan menawarkan pemandangan yang indah di daerah tersebut.",
            'address' => "Kepulauan Bangka Belitung",
        ]);

        Place::create([
            'placeId' => Str::uuid(),
            'name' => "Mandalika",
            'imagePath' => 'https://www.indonesia.travel/content/dam/indtravelrevamp/en/destinations/revisi-2020/revamp-image/mandalika/merese-hill.jpg',
            'rating' => '4.7',
            'email' => 'mandalika@gmail.com',
            'phone' => '08123456789',
            'galleryImages' => [
                'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSkDSn-I2wGVA-0E7429jcdoOsBaYs6s_WB6Q&s',
                'https://asset.kompas.com/crops/wzksWBojpTQ7yWPy1R8DzcSQm-Y=/0x61:740x554/1200x800/data/photo/2021/03/19/60543552897ed.jpg',
                'https://images.tokopedia.net/img/JFrBQq/2022/2/10/7febef73-71c2-4c71-a4ff-e22a36354425.jpg',
            ],
            'description' => " Mandalika, sebuah daerah yang berada di Pulau Lombok, Nusa Tenggara Barat (NTB) ini memiliki keindahan yang alami. Mandalika dikenal dengan wisata pantai dan laut yang cantik karena wilayahya berada tepat menghadap ke Samudera Hindia. Mandalika berasal dari nama seorang tokoh legenda, yaitu Putri Mandalika yang dikenal dengan parasnya yang cantik. Setiap tahunnya, masyarakat Lombok Tengah merayakan upacara Bau Nyale, yaitu ritual mencari cacing laut yang dipercaya sebagai jelmaan dari Putri Mandalika.",
            'address' => "Pulau Lombok, Nusa Tenggara Barat (NTB)",
        ]);
    }
}
