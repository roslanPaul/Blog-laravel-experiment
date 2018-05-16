<?php

use Faker\Factory as Faker;
use App\Models\Keyword;
use App\Repositories\KeywordRepository;

trait MakeKeywordTrait
{
    /**
     * Create fake instance of Keyword and save it in database
     *
     * @param array $keywordFields
     * @return Keyword
     */
    public function makeKeyword($keywordFields = [])
    {
        /** @var KeywordRepository $keywordRepo */
        $keywordRepo = App::make(KeywordRepository::class);
        $theme = $this->fakeKeywordData($keywordFields);
        return $keywordRepo->create($theme);
    }

    /**
     * Get fake instance of Keyword
     *
     * @param array $keywordFields
     * @return Keyword
     */
    public function fakeKeyword($keywordFields = [])
    {
        return new Keyword($this->fakeKeywordData($keywordFields));
    }

    /**
     * Get fake data of Keyword
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKeywordData($keywordFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'word' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $keywordFields);
    }
}
