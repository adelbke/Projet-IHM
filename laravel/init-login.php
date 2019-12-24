$user = new User();
$user->Firstname = "Adel";
$user->Lastname = "chbab";
$user->email="test@email.com";
$user->password=Hash::make('testPass');
$user->role ="SuperAdmin";
$user->confirmed = true;
$user->save();
