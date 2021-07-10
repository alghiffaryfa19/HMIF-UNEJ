<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Staff;
use App\Models\Proker;
use App\Models\Suggestion;
use App\Models\Portofolio;
use App\Models\Product;
use Acaronlex\LaravelCalendar\Calendar;
use DB;

class FrontendController extends Controller
{
    public function index()
    {
        $post = Post::with('category:id,name,slug','user:id,name')->latest()->take(3)->get();
        return view('welcome', compact('post'));
    }

    public function blog()
    {
        $post = Post::with('category:id,name,slug','user:id,name')->latest()->paginate(6);
        return view('frontend.blog', compact('post'));
    }

    public function produk()
    {
        $produk = Product::with(['foto' => function($q) {
            $q->limit(1)->first();
        }])->latest()->paginate(8);
        return view('frontend.product', compact('produk'));
    }

    public function portofolio()
    {
        $portofolio = Portofolio::with(['foto' => function($q) {
            $q->limit(1)->first();
        }])->latest()->paginate(8);
        return view('frontend.portofolio', compact('portofolio'));
    }

    public function staff()
    {
        $staff = Staff::with('divisi')->get();
        return view('frontend.staff', compact('staff'));
    }

    public function tentang()
    {
        return view('frontend.tentang');
    }

    public function detail_produk(Product $produk)
    {
        $detail = $produk->load('foto');
        return view('frontend.detail_produk', compact('detail'));
    }

    public function detail_portofolio(Portofolio $portofolio)
    {
        $detail = $portofolio->load('foto');
        return view('frontend.detail_portofolio', compact('detail'));
    }

    public function proker()
    {
        $proker = Proker::with('divisi')->paginate(6);
        return view('frontend.proker', compact('proker'));
    }

    public function krisar()
    {
        return view('frontend.krisar');
    }

    public function detail_post(Post $slug)
    {
        $detail = $slug->load('category:id,name,slug','user:id,name','tag:id,name,slug');
        return view('frontend.detail_post', compact('detail'));
    }

    public function detail_proker(Proker $slug)
    {
        $detail = $slug->load('divisi:id,name','timeline');
        return view('frontend.detail_proker', compact('detail'));
    }

    public function krisar_store(Request $request)
    {
        $this->validate($request, [
            'detail' => 'required',
        ]);

        Suggestion::create([
            'name' => $request->name ?? 'Anonim',
            'asal' => $request->asal ?? 'Anonim',
            'detail' => $request->detail,
        ]);

        return redirect()->route('landing')->with('sukses','Halo');
    }

    public function kalender()
    {
        $events = [];

        $event_jenjang = Proker::orderby('start','ASC')->get();
        
        foreach ($event_jenjang as $data) {
            $events[] = \Calendar::event(
                $data->name, //event title
                false, //full day event?
                new \DateTime($data->start), //start time (you can also use Carbon instead of DateTime)
                new \DateTime($data->end), //end time (you can also use Carbon instead of DateTime)
                sprintf("#%06x",rand(0,16777215)),
                route('detail_proker', $data->slug),
                'stringEventId', //optionally, you can specify an event ID
                
                
                
            );
        }

        $calendar = new Calendar();
                $calendar->addEvents($events)
                ->setOptions([
                    'locale' => 'id',
                    'firstDay' => 0,
                    'displayEventTime' => true,
                    'selectable' => true,
                    'initialView' => 'dayGridMonth',
                    'headerToolbar' => [
                        'end' => 'today prev,next'
                    ]
                ]);
                $calendar->setId('1');
                $calendar->setCallbacks([
                    'select' => 'function(selectionInfo){}',
                    'eventClick' => 'function(event){}'
                ]);

            return view('frontend.kalender', compact('calendar'));
    }
}
