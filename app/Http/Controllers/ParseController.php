<?

namespace App\Http\Controllers;

use Exception;
use Goutte\Client;
use Illuminate\Http\Request;

class ParseController extends Controller
{
    private $results = array();

    public function __invoke()
    {
        return view(
            "index",
            ["data" => $this->results]
        );
    }

    public function parse(Request $request)
    {
        try {
            $url = $request->link;
            $client = new Client();
            $page = $client->request('GET', $url);

            $page->filter($request->element)->each(function ($item) use ($request) {
                array_push($this->results, [
                    "title" => $item->filter($request->title)->text(),
                    "description" => $item->filter($request->description)->text()
                ]);
            });

            return view("index", ["data" => $this->results]);
        } catch (Exception $e) {
            dd($e);
        }
    }
}
