Hello {{ $user->name }}
Thank you for create an account .Please Verifiy your email using this link :
{{ route('verify',$user->verification_token) }}
