<?php
namespace App\Http\Controllers;

use Hamcrest\Core\HasToString;
use Hamcrest\Type\IsInteger;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

use function Laravel\Prompts\select;

class BookController extends Controller
{
    public function search(Request $request)
    {
        // $vitabu = DB::scalar(
        //     "select count(*) from books"
        // );
        // dd($vitabu);
        // $transacion = DB::transaction(function () {
        //     DB::select('select author from books where id = :id', ['id'=>23]);
        // });
        // dd($transacion);
        // $burgers = DB::select(
        //     "select author from books "
        // );
        //    dd($burgers);
//         $users = DB::table('users')->get();
 
// foreach ($users as $user) {

//     printf( $user->name);
// }
// $user = DB::table('users')->find(1);
// echo (string)$user->email;
// dd($user);  
        /* Retrieving on a single row */
        // $user=DB::table('users')->where('email', 'test@example.com')->value('name');
        // return $user;    
        
        // $books = DB::table('books')->find(104);
        // return $books;

        // $author = DB::table('books')->orderBy('id')->chunk(50, function (SupportCollection $books) {
        //     foreach ($books as $book) {
        //         // Perform any necessary actions with the book data
        //         echo $book->title. '<br>';
        //     }
        //     return false;
        // });

    //   $author =  DB::table('books')->orderBy('id')->lazy()->each(function (object $book){
    //         echo $book->title. '<br>';
    //     });
    //     dd($author);

    // $count = DB::table('books')->where('user_id', 29)->value('author');
    // var_dump( $count);
    // if ($count 
    // != 'Prof. Chris Miller') {
    //     return 'Book is loaned by Prof. Chris Miller';
    // }
    // else
    // return 'WOzaa mzeee';
        // $email = DB::table('books')
        // ->select('author', 'email as staff_email')
        // ->get();
    //  $email = DB::table('books')->distinct()->get();
    //     dd($email);
 
    
        // $insert = DB::insert('insert into books (id, title,author, loaned, staff_name, staff_email, staff_id) values (?, ?, ?, ?, ?, ?, ? )', [101, 'mstahiki', 'immanuel', 1, 'jennifer', 'jf@mail.com', 353]);
        // dd($insert);
        // Validate the input query
        // $books  = DB::table('books')->where('staff_id', '>', 112 )->get();
        // dd($books);
        
 // Fetch books with pagination
$books = DB::table('books')->paginate(12)->fragment('books');

// Pass the paginated data to the view
return view('testview', ['books' => $books]);


        $request->validate([
            'search' => 'required|string|min:3',
        ]);
        // Remove any SQL injection attempts
        $query = $request->input('search');
        $trimmedQuery = trim($query);

        
        if (stripos($trimmedQuery, 'SELECT') !== 0) {
            return back()->with('error', 'Only SELECT queries are allowed.');
        }

        try {
            // Execute 
            $results = DB::select($query);
        } catch (\Exception $e) {
            return back()->with('error', 'Invalid query. Please try again.');
        }

        return view('welcome', ['results' => $results]);
    }
    public function searchGet(Request $request)
    {
        // Validate the input query
        $request->validate([
            'search' => 'required|string|min:3',
        ]);

        // Get the input query
        $query = $request->input('search');
        $trimmedQuery = trim($query);

        // Check if the query is a SELECT query
        if (stripos($trimmedQuery, 'SELECT') !== 0) {
            return back()->with('error', 'Only SELECT queries are allowed.');
        }

        try {
            // Execute the query
            $results = DB::select(DB::raw($query));
        } catch (\Exception $e) {
            return back()->with('error', 'Invalid query. Please try again.');
        }

        return view('retrieve', ['results' => $results]);
    }
}
