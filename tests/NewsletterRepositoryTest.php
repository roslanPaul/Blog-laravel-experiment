<?php

use App\Models\Newsletter;
use App\Repositories\NewsletterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NewsletterRepositoryTest extends TestCase
{
    use MakeNewsletterTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var NewsletterRepository
     */
    protected $newsletterRepo;

    public function setUp()
    {
        parent::setUp();
        $this->newsletterRepo = App::make(NewsletterRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateNewsletter()
    {
        $newsletter = $this->fakeNewsletterData();
        $createdNewsletter = $this->newsletterRepo->create($newsletter);
        $createdNewsletter = $createdNewsletter->toArray();
        $this->assertArrayHasKey('id', $createdNewsletter);
        $this->assertNotNull($createdNewsletter['id'], 'Created Newsletter must have id specified');
        $this->assertNotNull(Newsletter::find($createdNewsletter['id']), 'Newsletter with given id must be in DB');
        $this->assertModelData($newsletter, $createdNewsletter);
    }

    /**
     * @test read
     */
    public function testReadNewsletter()
    {
        $newsletter = $this->makeNewsletter();
        $dbNewsletter = $this->newsletterRepo->find($newsletter->id);
        $dbNewsletter = $dbNewsletter->toArray();
        $this->assertModelData($newsletter->toArray(), $dbNewsletter);
    }

    /**
     * @test update
     */
    public function testUpdateNewsletter()
    {
        $newsletter = $this->makeNewsletter();
        $fakeNewsletter = $this->fakeNewsletterData();
        $updatedNewsletter = $this->newsletterRepo->update($fakeNewsletter, $newsletter->id);
        $this->assertModelData($fakeNewsletter, $updatedNewsletter->toArray());
        $dbNewsletter = $this->newsletterRepo->find($newsletter->id);
        $this->assertModelData($fakeNewsletter, $dbNewsletter->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteNewsletter()
    {
        $newsletter = $this->makeNewsletter();
        $resp = $this->newsletterRepo->delete($newsletter->id);
        $this->assertTrue($resp);
        $this->assertNull(Newsletter::find($newsletter->id), 'Newsletter should not exist in DB');
    }
}
