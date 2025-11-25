<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LandingPage;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $landing = LandingPage::first();

        if ($landing) {
            $landing->update([
                'section1_en' => '{"title":"The Media Landscape Has Changed. Has Your Strategy?","p1":"Viewers now curate their own entertainment, consuming over 3.5 billion hours of OTT content every month across Southeast Asia.","p2":"A majority now prefer streaming services to watch their favorite shows. This isn\u2019t just a trend, it\u2019s a fundamental shift in media behavior. To win in this new era, your brand must be present and relevant in the streaming world."}',
                'section1_id' => '{"title":"Lanskap Media Telah Berubah. Bagaimana Dengan Strategi Anda?","p1":"Penonton kini memilih hiburan mereka sendiri, menghabiskan lebih dari 3,5 miliar jam konten OTT setiap bulan di seluruh Asia Tenggara.","p2":"Mayoritas kini lebih memilih layanan streaming untuk menonton acara favorit mereka. Ini bukan sekadar tren, tetapi perubahan besar dalam perilaku media. Untuk memenangkan era baru ini, brand Anda harus hadir dan relevan di dunia streaming."}',
                'section2_en' => '{"title":"Our OTT Advertising Solutions","p1":"The media landscape has fundamentally shifted. Audiences have moved from traditional broadcast television to on-demand streaming services, creating a powerful new arena for brands to make a meaningful impact. Over-the-Top (OTT) advertising allows you to connect with these highly engaged viewers directly on their favorite platforms, placing your brand message in a premium, non-skippable environment.","p2":"Unlike traditional advertising, OTT provides unparalleled precision. We can reach specific households based on their interests, viewing habits, and demographics, ensuring your message is not only seen but also relevant. From the biggest screen in the living room to the mobile devices they carry everywhere, our solutions are designed to capture attention where it matters most."}',
                'section2_id' => '{"title":"Solusi Iklan OTT Kami","p1":"Lanskap media telah berubah secara mendasar. Penonton beralih dari televisi siaran tradisional ke layanan streaming on-demand, menciptakan arena baru yang kuat bagi brand untuk memberikan dampak berarti. Over-the-Top (OTT) memungkinkan Anda terhubung dengan penonton yang sangat terlibat secara langsung di platform favorit mereka, menempatkan pesan brand Anda dalam lingkungan premium yang tidak dapat dilewati.","p2":"Tidak seperti iklan tradisional, OTT menawarkan presisi yang tak tertandingi. Kami dapat menjangkau rumah tangga tertentu berdasarkan minat, kebiasaan menonton, dan demografi mereka, memastikan pesan Anda tidak hanya terlihat tetapi juga relevan. Dari layar terbesar di ruang keluarga hingga perangkat mobile yang mereka bawa ke mana pun, solusi kami dirancang untuk menangkap perhatian di tempat yang paling penting."}',
            ]);
        }
    }
}
