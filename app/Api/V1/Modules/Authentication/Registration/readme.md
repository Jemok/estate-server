
#### Member registration Api Definition

         POST /auth/register-member {{ Endpoint for member registration }}
         PAYLOAD :
                {
                "fistName"      : "James",  // required, string
                "secondName"    : "Mwangi", // required, string
                "thirdName"     : "Karoki", // optional, string
                "phoneNumber"   : "254712675071"
                "email"         : "karokijames40@gmail.com" // required // unique
                "password"      : "strong+password", // required
                "passwordConfirmation" : "strong+password" // required // matches password
                }
         RESPONSE :
                {
                "message" : "Member registration success!!!"
                }
     