<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function mainpage()
    {
        return redirect("login");

    }


    public function insert()
    {
        if (Auth::check()) {
            return view('insert', ['user' => Auth::user()]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function postLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);


        if ($validator->fails()) {

            return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
        }


        $credentials = $request->only('username', 'password');

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {

            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('panel', ['user' => Auth::user()]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');

    }

    public function logout()
    {
        \Illuminate\Support\Facades\Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function postRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father' => 'required',
            'shenasname' => 'required',
            'birth_day' => 'required',
            'mobile' => 'required',
            'username' => 'required|unique:users',
            'code' => 'required|unique:users',
            'password' => 'required|string|min:8|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors(), 'status' => 400], 400);
        }


        $input = $request->only(['username', 'password', 'code', 'name', 'father','shenasname', 'birth_day','mobile']);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return redirect()->back()->with('message', 'با موفقیت ثبت شد.');
    }

    public function register(Request $request)
    {

//        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//            'username' => 'required|unique:users',
//            'code' => 'required|unique:users',
//            'password' => 'required|string|min:8|max:255',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json(['error' => $validator->errors(), 'status' => 400], 400);
//        }

        $inppp = array(
            0 => array('name' => 'جواداثني عشري', 'father' => 'رضا', 'birth_day' => '600923', 'shenasname' => '2826', 'username' => '1289636435', 'code' => '11111343', 'mobile' => '09913281391', 'password' => '09913281391'),
            1 => array('name' => 'مسعوداحمدي حيدري', 'father' => 'اله وردي', 'birth_day' => '600630', 'shenasname' => '2440', 'username' => '1289632588', 'code' => '11113354', 'mobile' => '09131292416', 'password' => '09131292416'),
            2 => array('name' => 'احمدرضا اميري', 'father' => 'حسينعلي', 'birth_day' => '500601', 'shenasname' => '1087', 'username' => '1291175474', 'code' => '25353111', 'mobile' => '09133190850', 'password' => '09133190850'),
            3 => array('name' => 'سعیداميني نجف آبادي', 'father' => 'فتح اله', 'birth_day' => '530416', 'shenasname' => '26233', 'username' => '1090260271', 'code' => '27043341', 'mobile' => '09132316360', 'password' => '09132316360'),
            4 => array('name' => 'جعفرعلی انصاري', 'father' => 'حسن', 'birth_day' => '480901', 'shenasname' => '18', 'username' => '1199603678', 'code' => '95053583', 'mobile' => '09132018827', 'password' => '09132018827'),
            5 => array('name' => 'محمدانصاري منوچهرآبادي', 'father' => 'ابراهيم', 'birth_day' => '570515', 'shenasname' => '13', 'username' => '1199637106', 'code' => '95053625', 'mobile' => '09139200629', 'password' => '09139200629'),
            6 => array('name' => 'عباس ايزدي', 'father' => 'محمد', 'birth_day' => '430409', 'shenasname' => '1225', 'username' => '1110403801', 'code' => '11231100', 'mobile' => '09137884013', 'password' => '09137884013'),
            7 => array('name' => 'محمدآتش فراز', 'father' => 'محراب', 'birth_day' => '381123', 'shenasname' => '2449', 'username' => '1819366553', 'code' => '95053537', 'mobile' => '09137383342', 'password' => '09137383342'),
            8 => array('name' => 'مجتبی آقائي شروداني', 'father' => 'حسينعلي', 'birth_day' => '591101', 'shenasname' => '1459', 'username' => '1110829371', 'code' => '95053777', 'mobile' => '09013294944', 'password' => '09013294944'),
            9 => array('name' => 'مهدی باقرپور', 'father' => 'صفرعلي', 'birth_day' => '511008', 'shenasname' => '7457', 'username' => '56088582', 'code' => '25418913', 'mobile' => '09124502878', 'password' => '09124502878'),
            10 => array('name' => 'حسینعلی  بخشی', 'father' => 'نعمت اله', 'birth_day' => '581220', 'shenasname' => '1454', 'username' => '1129140768', 'code' => '11113516', 'mobile' => '09132895712', 'password' => '09132895712'),
            11 => array('name' => 'امراله برخورداري', 'father' => 'علي ميرزا', 'birth_day' => '650829', 'shenasname' => '10843', 'username' => '1292261439', 'code' => '11113428', 'mobile' => '09910159442', 'password' => '09910159442'),
            12 => array('name' => 'جلال برهاني', 'father' => 'محمد', 'birth_day' => '480304', 'shenasname' => '539', 'username' => '1286827965', 'code' => '95053262', 'mobile' => '09131187316', 'password' => '09131187316'),
            13 => array('name' => 'علیرضابقائي', 'father' => 'لطفعلي', 'birth_day' => '441001', 'shenasname' => '137', 'username' => '4622447908', 'code' => '18347542', 'mobile' => '09373876128', 'password' => '09373876128'),
            14 => array('name' => 'سیدمحمد بلاغی', 'father' => 'سید جواد', 'birth_day' => '620630', 'shenasname' => '984', 'username' => '2491205254', 'code' => '62680541', 'mobile' => '09354496179', 'password' => '09354496179'),
            15 => array('name' => 'حسین بنائي', 'father' => 'محمدعلي', 'birth_day' => '640606', 'shenasname' => '2178', 'username' => '1292915404', 'code' => '11111287', 'mobile' => '09132079558', 'password' => '09132079558'),
            16 => array('name' => 'حسین بهاء لوهوره', 'father' => 'عباسقلي', 'birth_day' => '510801', 'shenasname' => '1306', 'username' => '4621123769', 'code' => '25617572', 'mobile' => '09132703316', 'password' => '09132703316'),
            17 => array('name' => 'ابراهیم بهرامي', 'father' => 'حبيب اله', 'birth_day' => '601105', 'shenasname' => '1831', 'username' => '1199263389', 'code' => '95053791', 'mobile' => '09132211632', 'password' => '09132211632'),
            18 => array('name' => 'ابراهیم بياتي كميتكي', 'father' => 'ناصر', 'birth_day' => '410612', 'shenasname' => '1033', 'username' => '1282757865', 'code' => '25471741', 'mobile' => '09132195415', 'password' => '09132195415'),
            19 => array('name' => 'فضل اله پارسائي فر', 'father' => 'محمدتقي', 'birth_day' => '560915', 'shenasname' => '2478', 'username' => '1287034195', 'code' => '95053632', 'mobile' => '09132699300', 'password' => '09132699300'),
            20 => array('name' => 'برجعلی پورحيدري', 'father' => 'حسين', 'birth_day' => '520417', 'shenasname' => '149', 'username' => '1284133265', 'code' => '11111294', 'mobile' => '09135497391', 'password' => '09135497391'),
            21 => array('name' => 'محسن پورمند', 'father' => 'عبدالرحيم', 'birth_day' => '510328', 'shenasname' => '280', 'username' => '1199144592', 'code' => '59166784', 'mobile' => '09138219530', 'password' => '09138219530'),
            22 => array('name' => 'حسنعلی تقيان', 'father' => 'غلامحسين', 'birth_day' => '430102', 'shenasname' => '4', 'username' => '5499532117', 'code' => '11110969', 'mobile' => '09136305649', 'password' => '09136305649'),
            23 => array('name' => 'اصغرتوكلي گارماسه', 'father' => 'رجبعلي', 'birth_day' => '590305', 'shenasname' => '7', 'username' => '1111456984', 'code' => '11113410', 'mobile' => '09138104667', 'password' => '09138104667'),
            24 => array('name' => 'مسعودجركاني باصيري', 'father' => 'غلامرضا', 'birth_day' => '580301', 'shenasname' => '1223', 'username' => '1291493735', 'code' => '11111230', 'mobile' => '09131006044', 'password' => '09131006044'),
            25 => array('name' => 'بهزادحاجي صادقيان نجف', 'father' => 'علي محمد', 'birth_day' => '590528', 'shenasname' => '295', 'username' => '1091585067', 'code' => '95053641', 'mobile' => '09132314107', 'password' => '09132314107'),
            26 => array('name' => 'فرشادحسني اسطلخي', 'father' => 'علي', 'birth_day' => '480101', 'shenasname' => '6', 'username' => '2279642506', 'code' => '25782149', 'mobile' => '09132149727', 'password' => '09132149727'),
            27 => array('name' => 'محمودرضاحسيني', 'father' => 'محمدتقي', 'birth_day' => '520420', 'shenasname' => '2299', 'username' => '56142099', 'code' => '58598905', 'mobile' => '09139031019', 'password' => '09139031019'),
            28 => array('name' => 'مهدی حق شناس', 'father' => 'محمد', 'birth_day' => '621010', 'shenasname' => '64', 'username' => '6609675708', 'code' => '11111199', 'mobile' => '09132288022', 'password' => '09132288022'),
            29 => array('name' => 'مجتبی خدادادي كبوترآبادي', 'father' => 'غلامرضا', 'birth_day' => '621011', 'shenasname' => '3176', 'username' => '1289716145', 'code' => '11110976', 'mobile' => '09133031675', 'password' => '09133031675'),
            30 => array('name' => 'مجتبی خراجي', 'father' => 'هوشنگ', 'birth_day' => '570406', 'shenasname' => '860', 'username' => '1289515212', 'code' => '95053657', 'mobile' => '09132709531', 'password' => '09132709531'),
            31 => array('name' => 'مهدی خراط زاده خوراسگاني', 'father' => 'عباسعلي', 'birth_day' => '591129', 'shenasname' => '1928', 'username' => '1291523871', 'code' => '95053664', 'mobile' => '09137891370', 'password' => '09137891370'),
            32 => array('name' => 'کورش دانائي', 'father' => 'اكبر', 'birth_day' => '540224', 'shenasname' => '288', 'username' => '1289459037', 'code' => '11111262', 'mobile' => '09132880885', 'password' => '09132880885'),
            33 => array('name' => 'مسعود خشن', 'father' => 'محمدقلی', 'birth_day' => '481014', 'shenasname' => '67', 'username' => '1971915262', 'code' => '67681667', 'mobile' => '09134132832', 'password' => '09134132832'),
            34 => array('name' => 'محمددرستكارخوراسكاني', 'father' => 'حيدرعلي', 'birth_day' => '591226', 'shenasname' => '17221', 'username' => '1283873834', 'code' => '11111223', 'mobile' => '09139656344', 'password' => '09139656344'),
            35 => array('name' => 'مجتبی دهقان', 'father' => 'احمد', 'birth_day' => '640625', 'shenasname' => '2420', 'username' => '1292734116', 'code' => '11111216', 'mobile' => '09132664166', 'password' => '09132664166'),
            36 => array('name' => 'حسن دهقاني اسفرجاني', 'father' => 'حجت اله', 'birth_day' => '620501', 'shenasname' => '93', 'username' => '1199831591', 'code' => '11231527', 'mobile' => '09139589517', 'password' => '09139589517'),
            37 => array('name' => 'جوادرجبي ارزناني', 'father' => 'حيدرعلي', 'birth_day' => '600601', 'shenasname' => '2092', 'username' => '1287188575', 'code' => '11113393', 'mobile' => '09132254682', 'password' => '09132254682'),
            38 => array('name' => 'مهدی رحيم پور', 'father' => 'جمشيد', 'birth_day' => '510410', 'shenasname' => '95', 'username' => '5129641590', 'code' => '90874492', 'mobile' => '09131054958', 'password' => '09131054958'),
            39 => array('name' => 'هوشنگ رحیمی', 'father' => 'محمدرضا', 'birth_day' => '520103', 'shenasname' => '110', 'username' => '1129598187', 'code' => '11113361', 'mobile' => '09139329546', 'password' => '09139329546'),
            40 => array('name' => 'روح اله رنجكش آدرمنابادي', 'father' => 'محمدعلي', 'birth_day' => '590403', 'shenasname' => '624', 'username' => '6609640092', 'code' => '11111255', 'mobile' => '09134114874', 'password' => '09134114874'),
            41 => array('name' => 'مجتبی رنجكش آدرمنابادي', 'father' => 'علي اكبر', 'birth_day' => '610906', 'shenasname' => '31', 'username' => '6609664471', 'code' => '11113403', 'mobile' => '09901030646', 'password' => '09901030646'),
            42 => array('name' => 'افضل روانگرد', 'father' => 'محمدجعفر', 'birth_day' => '510701', 'shenasname' => '1551', 'username' => '4230172109', 'code' => '81005656', 'mobile' => '09177416454', 'password' => '09177416454'),
            43 => array('name' => 'علی اکبررئيسيان', 'father' => 'نوراله', 'birth_day' => '500601', 'shenasname' => '11061', 'username' => '1209100908', 'code' => '11113435', 'mobile' => '9136447292', 'password' => '9136447292'),
            44 => array('name' => 'علی زارع', 'father' => 'محمدحسن', 'birth_day' => '430101', 'shenasname' => '31', 'username' => '5110498725', 'code' => '11111181', 'mobile' => '09139662701', 'password' => '09139662701'),
            45 => array('name' => 'یعقوب زارع دنبه', 'father' => 'فتح اله', 'birth_day' => '650214', 'shenasname' => '5108', 'username' => '1292760869', 'code' => '11113451', 'mobile' => '09139075485', 'password' => '09139075485'),
            46 => array('name' => 'مهدی زارعان', 'father' => 'محمود', 'birth_day' => '590707', 'shenasname' => '1442', 'username' => '1287130501', 'code' => '11245792', 'mobile' => '09131025471', 'password' => '09131025471'),
            47 => array('name' => 'مهدی زارعي بوزاني', 'father' => 'محمدعلي', 'birth_day' => '380115', 'shenasname' => '15', 'username' => '1291319115', 'code' => '11111174', 'mobile' => '09138700754', 'password' => '09138700754'),
            48 => array('name' => 'ابراهیم سعيدي باغ ابريشمي', 'father' => 'حسين', 'birth_day' => '490217', 'shenasname' => '31', 'username' => '1111730091', 'code' => '25987228', 'mobile' => '09131022893', 'password' => '09131022893'),
            49 => array('name' => 'نعمت اله سلطاني رضائي', 'father' => 'محمدعلي', 'birth_day' => '480811', 'shenasname' => '1193', 'username' => '1285737547', 'code' => '26116154', 'mobile' => '09133162761', 'password' => '09133162761'),
            50 => array('name' => 'جلال سوران ينچشمه', 'father' => 'محمدرضا', 'birth_day' => '671222', 'shenasname' => '1270154486', 'username' => '1270154486', 'code' => '11113442', 'mobile' => '09139260758', 'password' => '09139260758'),
            51 => array('name' => 'منصورشاه طالبي حسين آب', 'father' => 'نوروز', 'birth_day' => '610927', 'shenasname' => '2678', 'username' => '1289159394', 'code' => '95053784', 'mobile' => '09132154729', 'password' => '09132154729'),
            52 => array('name' => 'حامد شفيع زاده', 'father' => 'مرتضي', 'birth_day' => '620629', 'shenasname' => '1777', 'username' => '1289702160', 'code' => '11231693', 'mobile' => '09132703440', 'password' => '09132703440'),
            53 => array('name' => 'بهروز شهابي', 'father' => 'غلامحسين', 'birth_day' => '520501', 'shenasname' => '752', 'username' => '4621537660', 'code' => '11110983', 'mobile' => '09138047062', 'password' => '09138047062'),
            54 => array('name' => 'مهدی شيخي داراني', 'father' => 'درويش', 'birth_day' => '580501', 'shenasname' => '119', 'username' => '1159529051', 'code' => '11230684', 'mobile' => '09139732480', 'password' => '09139732480'),
            55 => array('name' => 'اصغر شيرواني كرچگاني', 'father' => 'حسين', 'birth_day' => '480101', 'shenasname' => '7', 'username' => '1291881948', 'code' => '95053022', 'mobile' => '09133062668', 'password' => '09133062668'),
            56 => array('name' => 'فاطمه صامتي', 'father' => 'حسن', 'birth_day' => '561101', 'shenasname' => '75072', 'username' => '1281843415', 'code' => '95053689', 'mobile' => '09131283885', 'password' => '09131283885'),
            57 => array('name' => 'صادق صفدريان', 'father' => 'عباسقلي', 'birth_day' => '551005', 'shenasname' => '2228', 'username' => '1288100949', 'code' => '11111135', 'mobile' => '09354116719', 'password' => '09354116719'),
            58 => array('name' => 'علی طالبي', 'father' => 'محمد', 'birth_day' => '490901', 'shenasname' => '70', 'username' => '1291710231', 'code' => '11113386', 'mobile' => '09138986083', 'password' => '09138986083'),
            59 => array('name' => 'اکبر طالبي قهجاورستاني', 'father' => 'محمد', 'birth_day' => '480501', 'shenasname' => '56', 'username' => '1291707956', 'code' => '25417213', 'mobile' => '09130745729', 'password' => '09130745729'),
            60 => array('name' => 'سعید عابدي', 'father' => 'براتعلي', 'birth_day' => '520101', 'shenasname' => '11547', 'username' => '1283817365', 'code' => '95053696', 'mobile' => '09135331570', 'password' => '09135331570'),
            61 => array('name' => 'مجید عابدي خوراسگاني', 'father' => 'براتعلي', 'birth_day' => '540101', 'shenasname' => '33', 'username' => '1291437541', 'code' => '11245785', 'mobile' => '09358249170', 'password' => '09358249170'),
            62 => array('name' => 'حمیدرضا عالمي', 'father' => 'حسين', 'birth_day' => '620528', 'shenasname' => '2720', 'username' => '1288375158', 'code' => '11320629', 'mobile' => '09139155460', 'password' => '09139155460'),
            63 => array('name' => 'محمدعلی عبادي شروداني', 'father' => 'احمد', 'birth_day' => '500102', 'shenasname' => '27', 'username' => '1111134219', 'code' => '95053456', 'mobile' => '09132883880', 'password' => '09132883880'),
            64 => array('name' => 'بابک عبدالهي قلعه سوخته', 'father' => 'سردار', 'birth_day' => '631017', 'shenasname' => '296', 'username' => '4669545973', 'code' => '11113509', 'mobile' => '09132672688', 'password' => '09132672688'),
            65 => array('name' => 'مصطفی عسگري رناني', 'father' => 'محمدعلي', 'birth_day' => '460523', 'shenasname' => '10296', 'username' => '1283213893', 'code' => '11113467', 'mobile' => '09137152809', 'password' => '09137152809'),
            66 => array('name' => 'ابوالقاسم علي عسگريان زازران', 'father' => 'حسنعلي', 'birth_day' => '500703', 'shenasname' => '1495', 'username' => '1110143338', 'code' => '95053576', 'mobile' => '09103988918', 'password' => '09103988918'),
            67 => array('name' => 'ابوذر عيوضي', 'father' => 'شيبت الحمد', 'birth_day' => '661015', 'shenasname' => '138', 'username' => '6219982274', 'code' => '11112338', 'mobile' => '09139282675', 'password' => '09139282675'),
            68 => array('name' => 'حمزه عيوضي', 'father' => 'شريف', 'birth_day' => '641112', 'shenasname' => '54', 'username' => '6219956443', 'code' => '11112345', 'mobile' => '09133725345', 'password' => '09133725345'),
            69 => array('name' => 'سلمان عيوضي', 'father' => 'شريف', 'birth_day' => '570101', 'shenasname' => '2085', 'username' => '6219632397', 'code' => '11112352', 'mobile' => '09133295286', 'password' => '09133295286'),
            70 => array('name' => 'علی اکبر عيوضي', 'father' => 'شريف', 'birth_day' => '670429', 'shenasname' => '166', 'username' => '6219982551', 'code' => '11113499', 'mobile' => '09138157132', 'password' => '09138157132'),
            71 => array('name' => 'سمانه فاضلي', 'father' => 'عزيزاله', 'birth_day' => '650624', 'shenasname' => '10165', 'username' => '1292493992', 'code' => '11320611', 'mobile' => '09138336080', 'password' => '09138336080'),
            72 => array('name' => 'عباسعلی فروغي ابري', 'father' => 'عليرضا', 'birth_day' => '570228', 'shenasname' => '306', 'username' => '1291472101', 'code' => '95053706', 'mobile' => '09133179372', 'password' => '09133179372'),
            73 => array('name' => 'علی قانعي', 'father' => 'مرتضي', 'birth_day' => '540901', 'shenasname' => '648', 'username' => '1141709831', 'code' => '11111128', 'mobile' => '09386078519', 'password' => '09386078519'),
            74 => array('name' => 'نادعلی قائداميني', 'father' => 'حياتقلي', 'birth_day' => '490820', 'shenasname' => '18', 'username' => '4622069652', 'code' => '58556247', 'mobile' => '09133838745', 'password' => '09133838745'),
            75 => array('name' => 'گودرز قائدي', 'father' => 'اسكندر', 'birth_day' => '570501', 'shenasname' => '789', 'username' => '4072331661', 'code' => '11113474', 'mobile' => '09352555250', 'password' => '09352555250'),
            76 => array('name' => 'حسن قنبري جولرستاني', 'father' => 'رمضان', 'birth_day' => '651009', 'shenasname' => '506', 'username' => '1112160094', 'code' => '11111110', 'mobile' => '09132945957', 'password' => '09132945957'),
            77 => array('name' => 'جواد كاظمي', 'father' => 'حسن', 'birth_day' => '490906', 'shenasname' => '1360', 'username' => '1284750701', 'code' => '26171308', 'mobile' => '09133015135', 'password' => '09133015135'),
            78 => array('name' => 'مهرداد كاظمي', 'father' => 'جعفر', 'birth_day' => '431001', 'shenasname' => '9260', 'username' => '1283201925', 'code' => '95053590', 'mobile' => '09131867064', 'password' => '09131867064'),
            79 => array('name' => 'مهدی كريمي', 'father' => 'عبدالحسين', 'birth_day' => '591222', 'shenasname' => '60613', 'username' => '1282437763', 'code' => '95053738', 'mobile' => '09132653262', 'password' => '09132653262'),
            80 => array('name' => 'اکبر كريمي انداني', 'father' => 'عزيزاله', 'birth_day' => '570320', 'shenasname' => '497', 'username' => '1141127288', 'code' => '95053720', 'mobile' => '09384120084', 'password' => '09384120084'),
            81 => array('name' => 'حسین كلانتري', 'father' => 'محمدعلي', 'birth_day' => '531021', 'shenasname' => '1197', 'username' => '1286955785', 'code' => '25240002', 'mobile' => '09133276947', 'password' => '09133276947'),
            82 => array('name' => 'مهرداد  كمالي زازراني', 'father' => 'حسن علي', 'birth_day' => '581004', 'shenasname' => '2669', 'username' => '1285996259', 'code' => '95053713', 'mobile' => '09137366980', 'password' => '09137366980'),
            83 => array('name' => 'سعید کیانی', 'father' => 'محمد', 'birth_day' => '620101', 'shenasname' => '2', 'username' => '4669707310', 'code' => '11330135', 'mobile' => '09138794293', 'password' => '09138794293'),
            84 => array('name' => 'لیلا کیانی', 'father' => 'الیاس', 'birth_day' => '520620', 'shenasname' => '3008', 'username' => '4621106791', 'code' => '58811492', 'mobile' => '09132251330', 'password' => '09132251330'),
            85 => array('name' => 'محمد گرداني شروداني', 'father' => 'محمود', 'birth_day' => '681211', 'shenasname' => '1100064893', 'username' => '1100064893', 'code' => '11230645', 'mobile' => '09138009346', 'password' => '09138009346'),
            86 => array('name' => 'داود متولي زاده نائيني', 'father' => 'محمد', 'birth_day' => '560603', 'shenasname' => '225', 'username' => '1249486599', 'code' => '27011682', 'mobile' => '09133054541', 'password' => '09133054541'),
            87 => array('name' => 'محمدرضا مجتبائي', 'father' => 'علي', 'birth_day' => '460815', 'shenasname' => '9992', 'username' => '1283209268', 'code' => '95053287', 'mobile' => '09132242353', 'password' => '09132242353'),
            88 => array('name' => 'علی اصغر محمدشريفي', 'father' => 'ذبيح اله', 'birth_day' => '650701', 'shenasname' => '68', 'username' => '6219981571', 'code' => '11230564', 'mobile' => '09133675868', 'password' => '09133675868'),
            89 => array('name' => 'محمدرضا محمدشريفي', 'father' => 'قربانعلي', 'birth_day' => '650924', 'shenasname' => '75', 'username' => '6219981642', 'code' => '11230606', 'mobile' => '09139603914', 'password' => '09139603914'),
            90 => array('name' => 'مصطفی محمدي حسين آبادي', 'father' => 'حسينعلي', 'birth_day' => '620630', 'shenasname' => '2321', 'username' => '1289190331', 'code' => '11111054', 'mobile' => '09131093854', 'password' => '09131093854'),
            91 => array('name' => 'فرشته محمدي حسين آبادي', 'father' => 'حسينعلي', 'birth_day' => '590910', 'shenasname' => '25905', 'username' => '1282726420', 'code' => '95053745', 'mobile' => '09134088171', 'password' => '09134088171'),
            92 => array('name' => 'ابوالقاسم محمدي محمدي', 'father' => 'عباسعلي', 'birth_day' => '501001', 'shenasname' => '90', 'username' => '1249763215', 'code' => '25749643', 'mobile' => '09132662899', 'password' => '09132662899'),
            93 => array('name' => 'مجتبی محمدي', 'father' => 'سهراب', 'birth_day' => '490622', 'shenasname' => '34', 'username' => '6339682820', 'code' => '26070083', 'mobile' => '09131270732', 'password' => '09131270732'),
            94 => array('name' => 'محمدرضا  مختاري', 'father' => 'قدمعلي', 'birth_day' => '470102', 'shenasname' => '6', 'username' => '1111702055', 'code' => '25749675', 'mobile' => '09132949186', 'password' => '09132949186'),
            95 => array('name' => 'سیداحمدرضا مدينه', 'father' => 'سيدخليل', 'birth_day' => '450503', 'shenasname' => '439', 'username' => '1285677161', 'code' => '95053031', 'mobile' => '09133002618', 'password' => '09133002618'),
            96 => array('name' => 'حسین مديه', 'father' => 'صالح', 'birth_day' => '500101', 'shenasname' => '5', 'username' => '1819169332', 'code' => '95053294', 'mobile' => '09131662157', 'password' => '09131662157'),
            97 => array('name' => 'محمدعلی مرداني كچوئي', 'father' => 'اسماعيل', 'birth_day' => '441103', 'shenasname' => '731', 'username' => '2529386439', 'code' => '11111079', 'mobile' => '09137413026', 'password' => '09137413026'),
            98 => array('name' => 'محمود مشعلي فيروزي', 'father' => 'مهدي', 'birth_day' => '420412', 'shenasname' => '653', 'username' => '1819004988', 'code' => '25009646', 'mobile' => '09136551978', 'password' => '09136551978'),
            99 => array('name' => 'حسین مقصودي', 'father' => 'اكبر', 'birth_day' => '370714', 'shenasname' => '35', 'username' => '5129802470', 'code' => '95053424', 'mobile' => '09139000636', 'password' => '09139000636'),
            100 => array('name' => 'محمدعلی ممبيني', 'father' => 'كريم داد', 'birth_day' => '460809', 'shenasname' => '397', 'username' => '4819013939', 'code' => '66509039', 'mobile' => '09133138417', 'password' => '09133138417'),
            101 => array('name' => 'مهدی مومني', 'father' => 'محمدعلي', 'birth_day' => '550120', 'shenasname' => '2', 'username' => '1111173354', 'code' => '11111047', 'mobile' => '09134080933', 'password' => '09134080933'),
            102 => array('name' => 'ناصرنجفي', 'father' => 'حسين', 'birth_day' => '500501', 'shenasname' => '1440', 'username' => '1285778758', 'code' => '95053368', 'mobile' => '09131093997', 'password' => '09131093997'),
            103 => array('name' => 'رسول نجفي خوزاني', 'father' => 'فتح اله', 'birth_day' => '630929', 'shenasname' => '2975', 'username' => '1141338769', 'code' => '11231132', 'mobile' => '09132178857', 'password' => '09132178857'),
            104 => array('name' => 'یداله نجفي خوزاني', 'father' => 'فتح اله', 'birth_day' => '511108', 'shenasname' => '529', 'username' => '1141680769', 'code' => '95053752', 'mobile' => '09133125493', 'password' => '09133125493'),
            105 => array('name' => 'حسن نريماني', 'father' => 'حسينعلي', 'birth_day' => '540501', 'shenasname' => '779', 'username' => '1285855949', 'code' => '27004868', 'mobile' => '09133002474', 'password' => '09133002474'),
            106 => array('name' => 'پروانه نوريان دهكردي', 'father' => 'مهديقلي', 'birth_day' => '480401', 'shenasname' => '340', 'username' => '4621483201', 'code' => '58962364', 'mobile' => '09133811536', 'password' => '09133811536'),
            107 => array('name' => 'شاهرخ ويسي', 'father' => 'احمدعلي', 'birth_day' => '490825', 'shenasname' => '1377', 'username' => '1754804292', 'code' => '11111304', 'mobile' => '09367825468', 'password' => '09367825468'),
            108 => array('name' => 'سیدعلی هاشمي طالخونچه', 'father' => 'مصطفي', 'birth_day' => '470630', 'shenasname' => '2096', 'username' => '1286817013', 'code' => '95053600', 'mobile' => '09132940307', 'password' => '09132940307'),
            109 => array('name' => 'بهمن همتی', 'father' => 'علیمردان', 'birth_day' => '490407', 'shenasname' => '920', 'username' => '5759469207', 'code' => '25644216', 'mobile' => '09133312874', 'password' => '09133312874'),
            110 => array('name' => 'حسین يسلياني', 'father' => 'محمدعلي', 'birth_day' => '580904', 'shenasname' => '179', 'username' => '1129614018', 'code' => '11112313', 'mobile' => '09131861030', 'password' => '09131861030'),
            111 => array('name' => 'آزاده سادات وطن خواه', 'father' => 'سیدمهدی', 'birth_day' => '650926', 'shenasname' => '1180127821', 'username' => '1180127821', 'code' => '113299495', 'mobile' => '09133147337', 'password' => '09133147337'),
            112 => array('name' => 'یونس خودسیانی', 'father' => 'فضل اله', 'birth_day' => '460702', 'shenasname' => '182', 'username' => '1129583597', 'code' => '33202536', 'mobile' => '09132666915', 'password' => '09132666915'),
            113 => array('name' => 'منیژه روزبهی', 'father' => 'ویسمراد', 'birth_day' => '521219', 'shenasname' => '2395', 'username' => '1288927312', 'code' => '25424888', 'mobile' => '09134022551', 'password' => '09134022551'),
            114 => array('name' => 'حمیدرضا صالح', 'father' => 'محمد', 'birth_day' => '660625', 'shenasname' => '609', 'username' => '1189944431', 'code' => '11330086', 'mobile' => '9125143005', 'password' => '9125143005'),
            115 => array('name' => 'علی آل حسینی', 'father' => 'رسول', 'birth_day' => '630814', 'shenasname' => '2532', 'username' => '1141334313', 'code' => '11330262', 'mobile' => '9123204952', 'password' => '9123204952'),
            116 => array('name' => 'اکرم آزاد بخت', 'father' => 'ناصر', 'birth_day' => '440101', 'shenasname' => '11', 'username' => '1091044120', 'code' => '90911311', 'mobile' => '9131339465', 'password' => '9131339465'),
            117 => array('name' => 'نرگس خاموشیان', 'father' => 'تورج', 'birth_day' => '620625', 'shenasname' => '5247', 'username' => '0067412343', 'code' => '96404803', 'mobile' => '9133266320', 'password' => '9133266320'),
            118 => array('name' => 'محبوبه یعقوبی', 'father' => 'خدامراد', 'birth_day' => '590905', 'shenasname' => '2772', 'username' => '1289089868', 'code' => '96404804', 'mobile' => '9131702210', 'password' => '9131702210'),
            119 => array('name' => 'سید حسین زنجانی زاده', 'father' => 'سید احمد', 'birth_day' => '590620', 'shenasname' => '738', 'username' => '1288215207', 'code' => '96404755', 'mobile' => '9133671639', 'password' => '9133671639'),
            120 => array('name' => 'نوید سعیدی', 'father' => 'خسرو', 'birth_day' => '620206', 'shenasname' => '554', 'username' => '1289172651', 'code' => '96405041', 'mobile' => '9131654591', 'password' => '9131654591'),
            121 => array('name' => 'مرضیه صالحی', 'father' => 'اسماعیل', 'birth_day' => '590701', 'shenasname' => '2868', 'username' => '1754985769', 'code' => '96404472', 'mobile' => '9163102966', 'password' => '9163102966'),
            122 => array('name' => 'عباس عباسیان', 'father' => 'احمد', 'birth_day' => '670510', 'shenasname' => '644', 'username' => '6579978074', 'code' => '96404990', 'mobile' => '9179744069', 'password' => '9179744069'),
            123 => array('name' => 'هادی مشرف زاده ثانی', 'father' => 'احمد', 'birth_day' => '640119', 'shenasname' => '119', 'username' => '1289763781', 'code' => '96404449', 'mobile' => '9133692995', 'password' => '9133692995'),
            124 => array('name' => 'مهرداد افخمی', 'father' => 'نعمت اله', 'birth_day' => '640506', 'shenasname' => '1409', 'username' => '1292723998', 'code' => '96405218', 'mobile' => '9131865621', 'password' => '9131865621'),
            125 => array('name' => 'مهدی سراجی', 'father' => 'نصراله', 'birth_day' => '580712', 'shenasname' => '1617', 'username' => '1289553351', 'code' => '96405135', 'mobile' => '9137840270', 'password' => '9137840270'),
            126 => array('name' => 'گیتی شفیعی', 'father' => 'عزت اله', 'birth_day' => '480402', 'shenasname' => '50', 'username' => '1189328968', 'code' => '11330583', 'mobile' => '9131183643', 'password' => '9131183643'),
            127 => array('name' => 'پارسا یزدان پناه', 'father' => 'علیرضا', 'birth_day' => '680303', 'shenasname' => '1270087169', 'username' => '1270087169', 'code' => '96405300', 'mobile' => '9909491598', 'password' => '9909491598'),
            128 => array('name' => 'سید وحید مدرس', 'father' => 'سید حسین', 'birth_day' => '540612', 'shenasname' => '1493', 'username' => '1091165211', 'code' => '26177203', 'mobile' => '9131339304', 'password' => '9131339304'),
            129 => array('name' => 'مهنوش امیری', 'father' => 'مسیح اله', 'birth_day' => '620631', 'shenasname' => '1917', 'username' => '1289668401', 'code' => '96405301', 'mobile' => '9133687255', 'password' => '9133687255'),
            130 => array('name' => 'آتوسا شارقی', 'father' => 'آزاد مهر', 'birth_day' => '510331', 'shenasname' => '1001', 'username' => '0055872761', 'code' => '24792336', 'mobile' => '9131184633', 'password' => '9131184633'),
            131 => array('name' => 'محمد جواد رستگاری', 'father' => 'لقمان', 'birth_day' => '600531', 'shenasname' => '2343', 'username' => '1290631689', 'code' => '96405293', 'mobile' => '9131178852', 'password' => '9131178852'),
            132 => array('name' => 'اکبر جعفری', 'father' => 'قاسمعلي', 'birth_day' => '631210', 'shenasname' => '7213', 'username' => '1287413455', 'code' => '96405440', 'mobile' => '9136010064', 'password' => '9136010064'),
            133 => array('name' => 'محمدرضا خداخواه', 'father' => 'غلامرضا', 'birth_day' => '600623', 'shenasname' => '2437', 'username' => '1290632626', 'code' => '96405439', 'mobile' => '9133153904', 'password' => '9133153904'),
            134 => array('name' => 'مهرداد بابایی', 'father' => 'قاسمعلي', 'birth_day' => '500119', 'shenasname' => '19', 'username' => '6209661092', 'code' => '20130867', 'mobile' => '9138785396', 'password' => '9138785396'),
            135 => array('name' => 'محمد کیانپور', 'father' => 'ناصر', 'birth_day' => '590223', 'shenasname' => '471', 'username' => '4621674471', 'code' => '96405436', 'mobile' => '9131812400', 'password' => '9131812400'),
            136 => array('name' => 'مژگان محمد حسینی', 'father' => 'اسکندر', 'birth_day' => '13541220', 'shenasname' => '3990', 'username' => '4230111398', 'code' => '96405158', 'mobile' => '9177418020', 'password' => '9177418020'),
            137 => array('name' => 'سیدامیر بهروز حامی', 'father' => 'سیدحسین', 'birth_day' => '13680323', 'shenasname' => '1270305468', 'username' => '1270305468', 'code' => '96406860', 'mobile' => '9132707764', 'password' => '9132707764'),
            138 => array('name' => 'احسان قصابی', 'father' => 'حسین', 'birth_day' => '13681114', 'shenasname' => '1270380184', 'username' => '1270380184', 'code' => '11113481', 'mobile' => '9135880080', 'password' => '9135880080'),
            139 => array('name' => 'زمیفرا انصاری', 'father' => 'محمدعلی', 'birth_day' => '13460620', 'shenasname' => '97880', 'username' => '0380895064', 'code' => '82950236', 'mobile' => '9155407839', 'password' => '9155407839'),
            140 => array('name' => 'اسماعیل شهریاری', 'father' => 'محمد', 'birth_day' => '13521118', 'shenasname' => '4660703691', 'username' => '4660703691', 'code' => '58960868', 'mobile' => '9131835268', 'password' => '9131835268'),
            141 => array('name' => 'مهدی جعفری', 'father' => 'عزیز', 'birth_day' => '650105', 'shenasname' => '4515', 'username' => '1756820831', 'code' => '1378432766', 'mobile' => '9100637046', 'password' => '9100637046'),
            142 => array('name' => 'محمود پارسا منش', 'father' => 'محمد', 'birth_day' => '621204', 'shenasname' => '16183', 'username' => '0072257288', 'code' => '1378432795', 'mobile' => '9151412358', 'password' => '9151412358'),
            143 => array('name' => 'عباسعلی زمانی', 'father' => 'شیرمحمد', 'birth_day' => '650307', 'shenasname' => '5287', 'username' => '1292762659', 'code' => '1378432832', 'mobile' => '9132083228', 'password' => '9132083228'),
            144 => array('name' => 'سمیه شفیعی نیا', 'father' => 'حسن علی', 'birth_day' => '640117', 'shenasname' => '180', 'username' => '1287416543', 'code' => '1378432952', 'mobile' => '9139107671', 'password' => '9139107671'),
            145 => array('name' => 'رامین ولی', 'father' => 'نصراله', 'birth_day' => '680105', 'shenasname' => '1270064320', 'username' => '1270064320', 'code' => '1378432765', 'mobile' => '9132071883', 'password' => '9132071883'),
            146 => array('name' => 'مجید جان نثاری', 'father' => 'رضا', 'birth_day' => '620517', 'shenasname' => '3109', 'username' => '1285109503', 'code' => '96409912', 'mobile' => '9126105094', 'password' => '9126105094'),
        );

        foreach ($inppp as $keyy){
         $keyy['password'] = bcrypt($keyy['password']);
            $user = User::create($keyy);
        }
return "salam";
        $input = $request->only(['username', 'password', 'code', 'first_name', 'last_name']);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return $user;

    }

    public function postRequest(Request $request)
    {

        \App\Models\Request::create([
            'user-id' => (int)$request->user,
            'category-id' => (int)$request->cat
        ]);

        return redirect()->route('htmlPdf', ['cat' => $request->cat]);

//        return redirect("generate-pdf/".$request->cat)->with('cat',$request->cat);
//
//        return redirect()->back()->with('message', 'درخواست شما با موفقیت ثبت شد.');

    }

    public function allrequest()
    {
        if (Auth::check()) {
            return view('allrequest', ['user' => Auth::user()]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function req(Request $request,$cat)
    {

        if (Auth::check()) {
            return view('cat', ['user' => Auth::user(),'cat'=>explode('_', $cat)[1]]);
        }

        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    public function htmlPdf(Request $request,$cat)
    {
        if (Auth::check()) {
            return view('htmlView', ['user' => Auth::user(),'cat'=>$cat]);
        }

    }
}
