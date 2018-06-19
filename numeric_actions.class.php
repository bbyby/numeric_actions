<?php

/**
 * Class class_Numeric_Actions
 * @abstract Класс для работы с числами типа Int
 */
class class_Numeric_Actions
{

	private $clear_args = array();
	public  $result;

	/**
	 * @abstract Метод Проверка входящих параметров
	 * @param array ...$args
	 */
	public function validate( $action = 'add', ...$args ) {

		if ( func_num_args() <= 1 ){
			return "Ошибка: аргументов должно быть не меньше двух.";
		}

		//отделяем все не int
		foreach ( $args as $argument ) {
			if ( is_int($argument) ) {
				$this->clear_args[] = $argument;
			}
		}

		//отдельные проверки на каждую операцию
		switch ( $action ) {
			case 'add': break;
			case 'deduct': break;
			case 'divide':

				foreach ( $this->clear_args as $key => $arg ) {
					if ( $this->clear_args[$key + 1] == 0 ){
						return "Ошибка: один из аргументов при делении равен нулю";
					}
				}

				break;
			case 'devide_module':

				foreach ( $this->clear_args as $key => $arg ) {
					if ( $this->clear_args[$key + 1] == 0 ){
						return "Ошибка: один из аргументов при делении равен нулю";
					}
				}

				break;
			case 'multiply':
		}

	}

	/**
	 * @abstract Метод Сложение
	 * @param array ...$args
	 * @return int
	 */
	public function add( ...$args ) {

		$this->validate( ...$args );

		foreach ( $this->clear_args as $key => $argument ) {
			if ( !$key ) {
				$this->result = $argument;
			} else {
				$this->result += $argument;
			}
		}

		return $this->result;

	}

	/**
	 * @abstract Метод Вычитание
	 * @param array ...$args
	 * @return int
	 */
	public function deduct( ...$args ) {

		$this->validate( 'deduct', ...$args );

		foreach ( $this->clear_args as $key => $argument ) {
			if ( !$key ) {
				$this->result = $argument;
			} else {
				$this->result -= $argument;
			}
		}

		return $this->result;

	}

	/**
	 * @abstract Метод Деление
	 * @param array ...$args
	 * @return mixed
	 */
	public function divide( ...$args ) {

		$this->validate( 'divide', ...$args );

		foreach ( $this->clear_args as $key => $argument ) {
			if ( !$key ) {
				$this->result = $argument;
			} else {
				$this->result /= $argument;
			}
		}

		return $this->result;

	}

	/**
	 * @abstract Метод Целочисленный остаток от деления
	 * @param array ...$args
	 * @return int
	 */
	public function devide_module( ...$args ) {

		$this->validate( 'divide_module', ...$args );

		foreach ( $this->clear_args as $key => $argument ) {
			if ( !$key ) {
				$this->result = $argument;
			} else {
				$this->result %= $argument;
			}
		}

		return $this->result;

	}

	/**
	 * @abstract Метод Умножение
	 * @param array ...$args
	 * @return int
	 */
	public function multiply( ...$args ) {

		$this->validate( 'multiply', ...$args );

		foreach ( $this->clear_args as $key => $argument ) {
			if( !$key ) $this->result = $argument;
			$this->result *= $argument;
		}

		return $this->result;

	}


}