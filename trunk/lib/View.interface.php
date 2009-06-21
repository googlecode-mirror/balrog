<?php
interface IView{
	public function assign($label, $value);
	public function show();
}
