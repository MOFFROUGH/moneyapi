<?php


namespace App\Http\Controllers;
use App\Moneys;
use App\User;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoneyController extends Controller
{
   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function index(){

      return Auth::user()->moneys;

   }
   public function MarkAsPaid($id){

      $details = Moneys::findOrFail($id);
      $details->paid = 1;
      $details->save();
      return response()->json(['message'=>'success'], 200);

   }
   public function AddPayment(Request $request){
     Payment::create([
       'amount'=>$request->amount,
       'From'=>$request->name
     ]);
     $name = $request->name;
     $unpaid = Moneys::where('name', $name)->where('paid', 0)->get();

     return $unpaid;

  }
   public function clients(){

    $details = Moneys::select('name')->get();

    return $details;
   }
   public function writers(){

      $details = User::select('username')->get();

      return $details;

   }
   public function MarkAsDone($id){

      $details = Moneys::findOrFail($id);
      $details->done = 1;
      $details->paid = 1;
      $details->save();
      return response()->json(['message'=>'success'], 200);

   }

   public function show($id)

   {
      $details = Moneys::findOrFail($id);
      return $details;
   }

   public function store(Request $request)
   {

      Moneys::create([
         'name'=>$request->name,
         'description'=>$request->description,
         'amount'=>$request->amount,
         'done'=>$request->done,
         'paid'=>$request->paid,
         'shared'=>$request->shared,
         'user_id'=>$request->user_id
      ]);
      return response()->json(['message'=>'success'], 200);
   }


   public function update(Request $request, $id)
   {
      $details = Moneys::findOrFail($id);

      $details->update($request->all());
      return response()->json(['message' => 'success', 'details' => $details], 200);
   }

   public function destroy($id)
   {
      Moneys::destroy($id);
      return response()->json(['status' => 'success', 'message' => 'Entry Deleted Successfully']);
   }
}
