<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewsletterApiTest extends TestCase
{
    use MakeNewsletterTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateNewsletter()
    {
        $newsletter = $this->fakeNewsletterData();
        $this->json('POST', '/api/v1/newsletters', $newsletter);

        $this->assertApiResponse($newsletter);
    }

    /**
     * @test
     */
    public function testReadNewsletter()
    {
        $newsletter = $this->makeNewsletter();
        $this->json('GET', '/api/v1/newsletters/'.$newsletter->id);

        $this->assertApiResponse($newsletter->toArray());
    }

    /**
     * @test
     */
    public function testUpdateNewsletter()
    {
        $newsletter = $this->makeNewsletter();
        $editedNewsletter = $this->fakeNewsletterData();

        $this->json('PUT', '/api/v1/newsletters/'.$newsletter->id, $editedNewsletter);

        $this->assertApiResponse($editedNewsletter);
    }

    /**
     * @test
     */
    public function testDeleteNewsletter()
    {
        $newsletter = $this->makeNewsletter();
        $this->json('DELETE', '/api/v1/newsletters/'.$newsletter->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/newsletters/'.$newsletter->id);

        $this->assertResponseStatus(404);
    }
}
