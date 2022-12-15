function hashedPassword( $password ) {
		$random = openssl_random_pseudo_bytes( 18 );
		$salt = sprintf( '$2y$%02d$%s',
			12, // 2^n cost factor
			substr( strtr( base64_encode( $random ), '+', '.' ), 0, 22 )
		);

		// hash password with salt
		$hash = crypt( $password, $salt );

		// return hash
		return $hash;
	}
