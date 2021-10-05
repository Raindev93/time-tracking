<?php

namespace App\Services\Reports;

interface Igenerator{
	public function generate(array $data): void;
	public function setFileName(string $name): Igenerator;
	public function setTitle(string $title): Igenerator;
}