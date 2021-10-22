<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;


class StorageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
      $dummy = UploadedFile::fake()->create('dummy.pdf');
      
      $dummy->storeAs('','dummy.pdf', ['disk' => 's3']);
      
      $this->markTestIncomplete(
          'このテストは、まだ実装されていません。'
          );
      
      
    }
}
