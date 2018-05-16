<?php

use Faker\Factory as Faker;
use App\Models\Newsletter;
use App\Repositories\NewsletterRepository;

trait MakeNewsletterTrait
{
    /**
     * Create fake instance of Newsletter and save it in database
     *
     * @param array $newsletterFields
     * @return Newsletter
     */
    public function makeNewsletter($newsletterFields = [])
    {
        /** @var NewsletterRepository $newsletterRepo */
        $newsletterRepo = App::make(NewsletterRepository::class);
        $theme = $this->fakeNewsletterData($newsletterFields);
        return $newsletterRepo->create($theme);
    }

    /**
     * Get fake instance of Newsletter
     *
     * @param array $newsletterFields
     * @return Newsletter
     */
    public function fakeNewsletter($newsletterFields = [])
    {
        return new Newsletter($this->fakeNewsletterData($newsletterFields));
    }

    /**
     * Get fake data of Newsletter
     *
     * @param array $postFields
     * @return array
     */
    public function fakeNewsletterData($newsletterFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'surname' => $fake->word,
            'email' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $newsletterFields);
    }
}
