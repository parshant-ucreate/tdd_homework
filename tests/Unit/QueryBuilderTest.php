<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Components\QueryBuilder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QueryBuilderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testSelectAll() {
    	$query_builder = new QueryBuilder;
        $this->assertEquals('select * from products', $query_builder->select('products'));
    }

    public function testSelectColumn() {
    	$query_builder = new QueryBuilder;
        $this->assertEquals('select id, name from products', $query_builder->select('products', ['id', 'name']));
    }

    public function testColumnOrder() {
    	$query_builder = new QueryBuilder;
        $this->assertEquals('select id, name from products order by id desc', $query_builder->select('products', ['id', 'name'], ['id', 'desc']));
    }

    public function testMultiColumnSort() {
    	$query_builder = new QueryBuilder;
        $this->assertEquals('select * from products order by name asc, category asc', $query_builder->select('products', [['name', 'asc'],['category','asc']]));
    }

    public function testCorrectSpacings() {
    	$query_builder = new QueryBuilder;
        $this->assertEquals('SELECT id, name FROM products ORDER BY id DESC', $query_builder->select('products', ['id', 'name'], ['id', 'DESC']));
    }

    public function testLimit() {
    	$query_builder = new QueryBuilder;
        $this->assertEquals('select * from products limit 10', $query_builder->select('products', 10));
    }
}
