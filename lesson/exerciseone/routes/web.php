<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeesController;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\staffsController;
use App\Http\Controllers\dashboardsController;
use App\Http\Controllers\membersController;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Gender;
use App\Models\Item;
use App\Models\Tag;
use App\Models\User;
use App\Models\Photo;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/",function(){
	return "Save Myanmar";
});

Route::get("/sayar",function(){
	return "Hay,Sayar Nay Kaung Lar ??";
});

Route::get("sayhi",function(){
	return "Hi Min Ga Lar Par";
});

// Route::get("about",function(){
// 	return view("aboutme");
// });

// (or)

Route::view("about","aboutme");

// Route::get('/about/company',function(){
//     return view("aboutcompany");
// });

// (or)

Route::view('about/company',"aboutcompany");

// Route::get('contact',function(){
// 	return redirect('about');
// });

Route::redirect('contact',"about/company");




Route::get('about/company/{staff}',function(){
	return view('aboutcompanystaff',['sf'=>$staff]);
});

Route::get('about/company/{staff}/{city}',function($staff,$city){
	return view('aboutcompanystaffbycity',['sf'=>$staff,'ct'=>$city]);
});


Route::get('profile',function(){
	return view('profileme');
})->name('profiles');




// Route::get('/students',[\App\Http\Controllers\studentsController::class,'index'])->name('students.index');
// Route::get('/students/show',[\App\Http\Controllers\studentsController::class,'show'])->name('students.show');
// Route::get('/students/edit',[\App\Http\Controllers\studentsController::class,'edit'])->name('students.edit');


// Route::group(['prefix'=>'students'],function(){
// 	Route::get('/',[\App\Http\Controllers\studentsController::class,'index'])->name('students.index');
// 	Route::get('/show',[\App\Http\Controllers\studentsController::class,'show'])->name('students.show');
// 	Route::get('/edit',[\App\Http\Controllers\studentsController::class,'edit'])->name('students.edit');
// });

Route::name('students.')->group(function(){
	Route::get('/students',[studentsController::class,'index'])->name('index');
	Route::get('/students/show',[studentsController::class,'show'])->name('show');
	Route::get('/students/edit',[studentsController::class,'edit'])->name('edit');
});


Route::get('/staffs',[staffsController::class,'home'])->name('staffs.home');
Route::get('/staffsparty',[staffsController::class,'party'])->name('staffs.party');
Route::get('/staffsparty/{total}',[staffsController::class,'partytotal'])->name('staffs.partytotal');
Route::get('/staffsparty/{total}/{status}',[staffsController::class,'partytotalconfirm'])->name('staffs.status');


Route::get('employees',[employeesController::class,'index'])->name('employees.index');
Route::get('employees/show',[employeesController::class,'show'])->name('employees.show');
Route::get('employees/passingdataone',[employeesController::class,'passingdataone'])->name('employees.passingdataone');
Route::get('employees/passingdatatwo',[employeesController::class,'passingdatatwo'])->name('employees.passingdatatwo');
Route::get('employees/passingdatathree',[employeesController::class,'passingdatathree'])->name('employees.passingdatathree');
Route::get('employees/passingdatafour',[employeesController::class,'passingdatafour'])->name('employees.passingdatafour');

// 11/6/23
Route::get('employees/edit',[employeesController::class,'edit'])->name('employees.edit');
Route::get('employees/update',[employeesController::class,'update'])->name('employees.update');


// layout
// =>yield
Route::get('/dashboards',[dashboardsController::class,'index'])->name('dashboards.index');

Route::get('/members',[membersController::class,'index'])->name('membersController.index');


// =>Data Insert from Route

// use Illuminate/Support/Facades/DB;
Route::get('types/insert',function(){
	DB::insert("INSERT INTO types(name) value(?)",["pdf"]);
	return "Successfully Registered";
});

// Route::get('types/read',function(){
// 	$results = DB::select("SELECT * FROM types");
// 	return $results;
// });

// Route::get('types/read',function(){
// 	$results = DB::select("SELECT * FROM types");
// 	return var_dump($results);
// });

// Route::get('types/read',function(){
// 	$results = DB::select("SELECT * FROM types");
	
// 	foreach($results as $type){
// 		echo $type->name ."<br/>";
// 	}
// });

// Route::get('types/read',function(){
// 	$result = DB::select("SELECT * FROM types WHERE id=?",[1]);
// 	return $result;
// });


Route::get('students/insert',function(){
	DB::insert("INSERT INTO students(name,phonenumber,address) value (?,?,?)",['aung aung','111111','yangon']);
	return "Insert Successfully";
});

Route::get('students/update',function(){
	// DB::update("UPDATE types SET name='ebbok' WHERE id=?",[2]);
	DB::update("UPDATE types SET name='pdf' WHERE id=?",[2]);
	return "Update Successfully";
});

Route::get('shoppers/update',function(){
	DB::update("UPDATE shoppers SET fullname=?,phonenumber=?,city=? WHERE id=?",['kyaw kyaw','22222','bago',2]);
	return "Update Successfully";
});


Route::get('shoppers/delete',function(){
	// DB::delete("DELETE FROM shoppers WHERE id=?",[3]);
	DB::delete("DELETE FROM shoppers WHERE id=?",[2]);
	return "Delete Successfully";
});


Route::get('shoppers/read',function(){

	// $results = DB::select("SELECT * FROM shoppers");
	// return $results;

	// $results = DB::select("SELECT * FROM shoppers WHERE id=?",[6]);
	// return $results;

	// $results = DB::table('shoppers')->get();

	// =>select(columns)
	// =>selectRaw(expression)
	// =>DB:raw(value)


	// $results = DB::table('shoppers')->select('*')->get();
	// $results = DB::table('shoppers')->selectRaw('*')->get();

	// $results = DB::table('shoppers')->select(DB::raw('*'))->get();
	// $results = DB::table('shoppers')->selectRaw(DB::raw('*'))->get();

	// $results = DB::table('shoppers')->select('*')->where('id',5)->get();
	// $results = DB::table('shoppers')->select('fullname')->where('id',5)->get();
	// $results = DB::table('shoppers')->select('fullname','phonenumber')->where('id',5)->get();
	// $results = DB::table('shoppers')->select('fullname','phonenumber','city')->where('id',5)->get();

	// $results = DB::table('shoppers')->select('fullname','phonenumber','city')->where('id','<>',5)->get();


	// $results = DB::table('shoppers')->select(DB::raw('*'))->where('id',5)->get();
	// $results = DB::table('shoppers')->select(DB::raw('fullname'))->where('id',5)->get();
	// $results = DB::table('shoppers')->select(DB::raw('fullname,phonenumber'))->where('id',5)->get();
	// $results = DB::table('shoppers')->select(DB::raw('fullname,phonenumber,city'))->where('id',5)->get();


	// $results = DB::table('shoppers')->selectRaw('*')->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw('fullname')->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw('fullname,phonenumber')->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw('fullname,phonenumber,city')->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw('fullname,phonenumber,city')->where('id','<>',5)->get();

	// $results = DB::table('shoppers')->selectRaw(DB::raw('*'))->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw(DB::raw('fullname'))->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw(DB::raw('fullname,phonenumber'))->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw(DB::raw('fullname,phonenumber,city'))->where('id',5)->get();
	// $results = DB::table('shoppers')->selectRaw(DB::raw('fullname,phonenumber,city'))->where('id','<>',5)->get();

	// $results = DB::table('shoppers')->select('count(*) AS totalshopper,city')->where('id','<>',5)->groupBy('city')->get();

	$results = DB::table('shoppers')->select(DB::raw('count(*) AS totalshopper,city'))->where('id','<>',5)->groupBy('city')->get();


	return $results;

});


// => Database Eloquent ORM (Object-Relational Mapper)
// sro
// use App\Models\Article;

// Route::get('articles/read',function(){

// 	// $articles = Article::all();
// 	// return $articles;

// 	// $articles = Article::all();
// 	// return "$articles";

// 	// $articles = Article::all();
// 	// var_dump($articles);

// 	foreach($articles as $article){
// 		echo "$article->title <br/> $article->description <hr/>";
// 	}
// });

// Route::get('article/find',function(){

// 	// $article = Article::find(1);  // find() is only return 1 result and connected with $primaryKey
// 	// return $article;

// 	// =Not Found Exception
// 	// $article = Article::findorFail(20); 
// 	// return $article;  // 404 NOT FOUND

// 	$article = Article::findorFail(1); 
// 	echo "$article->title <br/> $article->description <hr/>";  

	// findOr('id',callback function)
	// $article = Article::findOr('12',function(){
	// 	return "Hello sir there is no result for Primary ID 12";
	// }); 
	// return $article; 

// });

Route::get('article/where',function(){

	// $article = Article::where('user_id',2)->get();  
	// return $article;

	// = asc/desc
	// $article = Article::where('user_id',1)->orderBy('id','desc')->get();  // 5 to 1
	// $article = Article::where('user_id',1)->orderByDesc('id')->get();  // 5 to 1
	// return $article;

	// $article = Article::where('user_id',2)->orderBy('id','asc')->take(3)->get(); 
	// $article = Article::where('user_id',2)->take(3)->orderBy('id','asc')->get(); 
	// $article = Article::where('user_id',2)->orderBy('id','asc')->limit(3)->get(); 
	// return $article;

	// $article = Article::where('user_id',2)->first(); 
	// return $article;

	// $article = Article::where('id',">",3)->get(); 
	// return $article;

	// $article = Article::where('d',2)->select('user_id','title','description')->first(); 
	// return $article;

	// $article = Article::where('id',2)->plunk('description');  //array
	// $article = Article::where('id',2)->plunk('description','id'); // object
	// return $article;

	// $article = Article::firstWhere('user_id',2); 
	// return $article;

	// =Not Found Exception
	// $articles = Article::where('id','>',5)->get(); 
	// return $articles;

	// $article = Article::where('id','>',50)->firstOrFail(); 
	// return $article;  // 404 NOT FOUND 

	// firstOr(callback function)
	$article = Article::where('user_id',3)->firstOr(function(){
		return "Hello sir there is no result for User ID 3";
	});
	return $article;
});


// =>Retrieving Aggregates

Route::get('articles/aggregates',function(){
	
	$data = [
		['price'=>100],
		['price'=>200],
		['price'=>300],
		['price'=>400]
	];

	// var_dump($data);
	// echo "<br/>";
	// var_dump(collect($data));

	// dd(
	// 	$data,
	// 	collect($data)
	// );

	// return collect($data)->count();  // 4
	// return collect($data)->max();  // {"price":400}

	// return collect($data)->max(function($num){
	// 	return $num['price'];
	// }); 
	
	// return collect($data)->min();  // {"price":100}

	// return collect($data)->min(function($num){
	// 	return $num['price'];
	// });   // 100

	// return collect($data)->average(function($num){
	// 	return $num['price'];
	// });  // 250
	
	// return collect($data)->avg(function($num){
	// 	return $num['price'];
	// });  // 250

	// return collect($data)->sum(function($num){
	// 	return $num['price'];
	// });  // 1000

	// $articles = Article::all()->count();
	// return $articles;  // 10

	// $articles = Article::where('user_id',1)->count();
	// return $articles;   // 5

	// $articles = Article::where('user_id',2)->max('rating');
	// return $articles;   // 4

	// $articles = Article::where('user_id',1)->min('rating');
	// return $articles;  // 2

	// $articles = Article::where('user_id',1)->average('rating');
	// $articles = Article::where('user_id',1)->avg('rating');
	// return $articles;   // 3.6000

	$articles = Article::where('user_id',1)->sum('rating');
	return $articles;   // 18

});


// ---------------------------------------


// => Retrieving or Creating Data to Model

Route::get('articles/create',function(){

	// $article = Article::firstOrCreate([
	// 	'title'=>'this is new article 1'
	// ]);
	// return "Retrieve Data or Insert $article";

	// $article = Article::firstOrCreate([
	// 	'title'=>'this is new article 16',  // 11 to 16
	// 	'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
	// 	'user_id'=>3,
	// 	'rating'=>4
	// ]);
	// return "Retrieve Data or Insert $article";

	$article = Article::firstOrCreate(
		[	'title'=>'this is new article 17'],
		[
			'description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
			'user_id'=>1,
			'rating'=>5
		]);
	return "Retrieve Data or Insert $article";
});


Route::get('articles/filter',function(){
	
	$articles = Article::all()->filter(function($article){
		return $article->id > 8;
	});

	// $articles = Article::get()->filter(function($article){
	// 	return $article->id > 7;
	// });

	// $articles = Article::cursor()->filter(function($article){
	// 	return $article->id > 5;
	// });

	foreach($articles as $article){
		echo "$article->id <br/> $article->title <br/> $article->description";
	}

});


Route::get('articles/reject',function(){
	
	$data = [
		100,
		200,
		300,
		0,
		'0',
		1,
		'1',
		'aung aung',
		'',
		' ',
		null,
		true,
		false,
		[],
		['red','green','blue'],
		['price'=>100]
	];

	// dd(
	// 	$data,
	// 	collect($data)
	// );

	$collections = collect($data);

	// return $collections->reject();  // {"3":0,"4":"0","8":"","10":null,"12":false,"13":[]}  // reject not return number,string and true value.but return 0
	
	// return $collections->reject(function($value){
	// 	return empty($value);  // {"0":100,"1":200,"2":300,"5":1,"6":"1","7":"aung aung","9":" ","11":true,"14":["red","green","blue"],"15":{"price":100}}
	// });   // empty() is same method like reject()

	return $collections->filter(function($value){
		// return $value;  // {"0":100,"1":200,"2":300,"5":1,"6":"1","7":"aung aung","9":" ","11":true,"14":["red","green","blue"],"15":{"price":100}}
		// return empty($value);  // {"3":0,"4":"0","8":"","10":null,"12":false,"13":[]}
		// return is_numeric($value);  // [100,200,300,0,"0",1,"1"]
		// return is_string($value);   // {"4":"0","6":"1","7":"aung aung","8":"","9":" "}
		// return is_bool($value);    //{"11":true,"12":false}  
		// return is_array($value);    // {"13":[],"14":["red","green","blue"],"15":{"price":100}}
		return is_null($value);  //{"10":null} 
	});     
});


// 29/07

// =>whereColumn('column1','column2');  // compare and result same value
// =>whereColumn('column1','comparison operator','column2');  // compare and result same value
// =>whereColumn([['column1','column2'],['column1','column2']]);  // compare and result same value

Route::get('articles/wherecolumn',function(){
	
	// $articles = Article::whereColumn('id','user_id')->get();
	// return $articles;

	// $articles = Article::whereColumn('created_date','updated_date')->get();
	// return $articles;

	// $articles = Article::whereColumn('updated_date','>','created_date')->orderByDESC('id')->get();
	// return $articles;
	
	// $articles = Article::whereColumn([
	// 	['id','>','user_id']
	// ])->get();
	// return $articles;

	$articles = Article::whereColumn([
		['id','>','user_id'],
		['created_date','updated_date']
	])->get();
	return $articles;
});



Route::get('articles/insert',function(){
	
	// always insert when you reload the page 

	// Method 1
	// $article = new Article();
	// $article->title = "this is new article 21";  // 18 to 21
	// $article->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry";
	// $article->user_id = 1;
	// $article->rating = 3;
	// $article->save(); // need when you wanna save in table
	// return "Data Inserted $article";

	// Method 2
	// $article = Article::create([
	// 	'title'=>"this is new article 22",
	// 	'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry",
	// 	'user_id'=>2,
	// 	'rating'=>5
	// ]);
	// return "Data Inserted $article";

	// echo now();  //2023-07-29 14:27:36
	// echo "<br/>";
	// var_dump(now());  // return object

	// echo now()->toDateTimeString();  //2023-08-02 21:28:16
	// echo "<br/>";
	// var_dump(now()->toDateTimeString());  // string(19) "2023-08-02 21:27:48"


	// echo now()->toDateTimeString();
	// echo "<br/>";
	// echo now("Asia/Yangon")->toDateTimeString();
	// echo "<br/>";
	// echo now("Asia/Bangkok")->toDateTimeString();

	// echo date('Y-m-d H:i:s');


	date_default_timezone_set('Asia/Yangon');
	$getdate = now()->toDateTimeString();
	// $today = date('Y-m-d H:i:s');

	// $article = DB::table('articles')->insert([
	// 	'title'=>"this is new article 24",
	// 	'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry",
	// 	'user_id'=>2,
	// 	'rating'=>5,
	// 	// 'created_date'=>now(),
	// 	// 'updated_date'=>now()
	// 	'created_date'=>$getdate,
	// 	'updated_date'=>$today
	// ]);

	// return "Data Inserted $article";

	// use Carbon\Carbon;
	$curdatetime = Carbon::now();
	// echo $curdatetime;
	// var_dump($curdatetime);  //object

	$article = DB::table('articles')->insert([
		'title'=>"this is new article 23",
		'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry",
		'user_id'=>3,
		'rating'=>2,
		// 'created_date'=>now(),
		// 'updated_date'=>now()
		'created_date'=>$getdate,
		'updated_date'=>$curdatetime
	]);

	return "Data Inserted $article";

});


Route::get('articles/update',function(){
	
	// $article = Article::find(1);
	// $article->title = "this is new article 01";
	// $article->save();

	// $article = Article::findorFail(10);
	// $article->title = "this is new article 010";
	// $article->user_id = 4;
	// $article->save();
	// return "Data Updated $article";

	// = Mass Updates

	// $article = Article::where('rating',1)->update(['rating'=>2]);
	// $article = Article::where('user_id',2)
	// 			->where('rating',5)
	// 			->update(['rating'=>3]);
	// return "Data Updated Successfully = $article";



	$article = Article::updateOrCreate(
		['title'=>'this is new article 01','description'=>'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'],
		['user_id'=>2,'rating'=>5]
	);
	return "Data Updated or Created Successfully = $article";


});

Route::get('articles/delete',function(){
	
	// $article = Article::find(1);

	// $article = Article::findOrFail(2);
	// $article->delete();
	// return "Data Deleted Successfully = $article";

	// $article = Article::where('rating',3)->delete();
	// return "Data Deleted Successfully = $article";


	// = Bulk Delete ( Note :: must be primary key )
	// $article = Article::destroy(8);
	// $article = Article::destroy(7,6);
	// $article = Article::destroy([1,2,3]);
	// $article = Article::destroy(collect([9,10]));

	// return "Data Deleted Successfully = $article";


	// = truncate ( Be Careful & ID will start from 1 again)
	// Article::truncate();
	// return "Data Truncated Successfully";


	// $article = Article::findOrFail(4);
	// $article->delete();

	// $article = Article::destroy(13,14,15);

	// $article = Article::destroy([19,20]);
	$article = Article::destroy(collect([11,12,13,14,15]));

	return "Soft Deleted Successfully = $article";
});


Route::get('articles/restore',function(){

	// Article::withTrashed()->restore();
	// return "Restore From Trash Successfully";

	// If you delete with softdeleted,it don't show a result but it exits in database
	// $articles = Article::all();
	// return $articles;

	Article::withTrashed()
			->where('rating',5)
			->restore();
	return "Restore From Trash Successfully";
});


Route::get('articles/forcedelete',function(){

	// $article = Article::findOrFail(4);
	// $article->delete();
	
	// $article = Article::findOrFail(5);
	// $article->forceDelete();

	// Result = 404 Not Found. cuz 13 is already in soft delete
	// $article = Article::findOrFail(13);
	// $article->delete();

	// Result = 404 Not Found. cuz 13 is already in soft delete
	$article = Article::findOrFail(13);
	$article->forceDelete();

	return "Data force Deleted Successfully";
});


Route::get('articles/gettrash',function(){

	// $articles = Article::all();
	// return $articles;  // not inc from trash

	// $articles = Article::withTrashed()->get();
	// return $articles;    // all inc from trash & non trash
	                          
	// $articles = Article::withTrashed()
	// 			->where('rating',2)
	// 			->get();
	// return $articles;    // all inc from trash & non trash by rating 2

	// $articles = Article::onlyTrashed()->get();
	// return $articles;  // all from trash only

	// $articles = Article::onlyTrashed()
	// 			->where('rating',1)
	// 			->get();
	// return $articles;  // all from trash only by rating 3


	$articles = Article::onlyTrashed()->findOrFail(4); 
	return $articles;  // id-4 from trash only

});

Route::get('articles/restoresingle',function(){
	
	// $article = Article::findOrFail(4); 
	// return $article;  // 404 Not Found

	$article = Article::onlyTrashed()
				->findOrFail(4)
				->restore(); 
	return $article;  

});

// ---------------------------------------


// => Eloquent Relationships

// =One to One

Route::get('users/{id}/article',function($id){

	$article = User::findorFail($id)->article->title;
	// $article = User::findorFail($id)->article->description;
	// $article = User::findorFail($id)->article->rating;


	return $article;
});

Route::get('articles/{id}/user',function($id){

	// $article = Article::findOrFail($id)->user->name;
	$article = Article::findOrFail($id)->user->email;

	return $article;
});

// =One to Many

Route::get('articles/{id}/byuser',function($id){

	// $user = User::findOrFail($id);
	// return $user->articles;

	$user = User::findOrFail($id);

	foreach($user->articles as $article){
		echo $article->title."<br/>";
	}

});


// = Many to Many

Route::get('user/{id}/role',function($id){

	// $user = User::findOrFail($id);
	// return $user->roles;

	// $user = User::findOrFail($id);
	// foreach($user->roles as $role){
	// 	echo $role->name."<br/>";
	// }

	$user = User::findOrFail($id)->roles()->get();
	return $user;
});

Route::get('users/{id}/rolecreatedate',function($id){

	$user = User::findOrFail($id);
	
	foreach($user->rolecreatedate as $role){
		echo $role->pivot->created_at."<br/>";
	}
});

// = Has Many Through

Route::get('gender/{id}/article',function($id){

	$gender = Gender::findOrFail($id);

	foreach($gender->articles as $article){
		echo $article->title."<br/>";
	}
});

// = Polymorphic Relationship


Route::get('users/{id}/photo',function($id){
	$user = User::findOrFail($id);

	foreach($user->photos as $photo){
		echo $photo->path."<br/>";
	}
});

Route::get('articles/{id}/photo',function($id){
	$article = Article::findOrFail($id);

	foreach($article->photos as $photo){
		echo $photo->path."<br/>";
	}
});
// --------


// = Reverse Thinking

Route::get('photos/{id}/result',function($id){

	$photo = Photo::findOrFail($id);
	// return $photo->imageable;
	return $photo->imageable->title;

	// $photo = Photo::findOrFail($id);
	// return $photo->photoable;

});

// --------

Route::get('articles/{id}/comment',function($id){
	$article = Article::findOrFail($id);

	foreach($article->comments as $comment){
		echo $comment->message."<br/>";
	}
});

Route::get('users/{id}/comment',function($id){
	$user = User::findOrFail($id);

	foreach($user->comments as $comment){
		echo $comment->message."<br/>";
	}
});

// --------

// = Polymorphic Relationship Many to Many

Route::get('items/{id}/tag',function($id){

	$items = Item::findOrFail($id);
	// return $items->tags;

	foreach($items->tags as $tag){
		echo $tag->name."<br/>";
	}
});

Route::get('tags/{id}/article',function($id){

	$tag = Tag::findOrFail($id);

	foreach($tag->articles as $article){
		echo $article->title."<br/>";
	}
});

Route::get('tags/{id}/item',function($id){

	$tag = Tag::findOrFail($id);

	foreach($tag->items as $item){
		echo $item->name."<br/>";
	}

});