<?php

//{{{ SdfApi_RequestInfo
/**
 * Объект-контейнер параметров запроса
 * 
 * @since 01.04.2010 12:25:00
 * @author megaplan
 */
class SdfApi_RequestInfo {

/** Список параметров @var array */
	protected $params;
/** Список поддерживаемых HTTP-методов @var array */
	protected static $supportingMethods = array( 'GET', 'POST', 'PUT', 'DELETE' );
/** Список принимаемых HTTP-заголовков @var array */
	protected static $acceptedHeaders = array( 'Date', 'Content-Type', 'Content-MD5', 'Post-Fields' );
//-----------------------------------------------------------------------------

//{{{ create
/**
 * Создает и возвращает объект
 * @since 01.04.2010 13:46
 * @author megaplan
 * @param string $Method Метод запроса
 * @param string $Host Хост мегаплана
 * @param string $Uri URI запроса
 * @param array $Headers Заголовки запроса
 * @return SdfApi_RequestInfo
 */
	public static function create( $Method, $Host, $Uri, array $Headers )
	{
		$Method = mb_strtoupper( $Method );
		if ( ! in_array( $Method, self::$supportingMethods ) ) {
			throw new Exception( "Unsupporting HTTP-Method '$Method'" );
		}

		$params = array(
			'Method' => $Method,
			'Host' => $Host,
			'Uri' => $Uri
		);

	// фильтруем заголовки
		$validHeaders = array_intersect_key( $Headers, array_flip( self::$acceptedHeaders ) );
		$params = array_merge( $params, $validHeaders );

		$request = new self( $params );

		return $request;
	}
//===========================================================================}}}
//{{{ __construct
/**
 * Создает объект
 * @since 01.04.2010 13:59
 * @author megaplan
 * @param array $Params Параметры запроса
 */
	protected function __construct( array $Params )
	{
		$this->params = $Params;
	}
//===========================================================================}}}
//{{{ __get
/**
 * Возвращает параметры запроса
 * @since 01.04.2010 14:26
 * @author megaplan
 * @param string $Name
 * @return string
 */
	public function __get( $Name )
	{
		$Name = preg_replace( "/([a-z]{1})([A-Z]{1})/u", '$1-$2', $Name );

		if ( ! empty( $this->params[$Name] ) ) {
			return $this->params[$Name];
		}
		else {
			return '';
		}
	}
//===========================================================================}}}

}
/*============================================================================*
 *  END OF SdfApi_RequestInfo                                                 *
 *=========================================================================}}}*/