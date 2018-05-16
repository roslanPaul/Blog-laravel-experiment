<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKeywordAPIRequest;
use App\Http\Requests\API\UpdateKeywordAPIRequest;
use App\Models\Keyword;
use App\Repositories\KeywordRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KeywordController
 * @package App\Http\Controllers\API
 */

class KeywordAPIController extends AppBaseController
{
    /** @var  KeywordRepository */
    private $keywordRepository;

    public function __construct(KeywordRepository $keywordRepo)
    {
        $this->keywordRepository = $keywordRepo;
    }

    /**
     * Display a listing of the Keyword.
     * GET|HEAD /keywords
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->keywordRepository->pushCriteria(new RequestCriteria($request));
        $this->keywordRepository->pushCriteria(new LimitOffsetCriteria($request));
        $keywords = $this->keywordRepository->all();

        return $this->sendResponse($keywords->toArray(), 'Keywords retrieved successfully');
    }

    /**
     * Store a newly created Keyword in storage.
     * POST /keywords
     *
     * @param CreateKeywordAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKeywordAPIRequest $request)
    {
        $input = $request->all();

        $keywords = $this->keywordRepository->create($input);

        return $this->sendResponse($keywords->toArray(), 'Keyword saved successfully');
    }

    /**
     * Display the specified Keyword.
     * GET|HEAD /keywords/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Keyword $keyword */
        $keyword = $this->keywordRepository->findWithoutFail($id);

        if (empty($keyword)) {
            return $this->sendError('Keyword not found');
        }

        return $this->sendResponse($keyword->toArray(), 'Keyword retrieved successfully');
    }

    /**
     * Update the specified Keyword in storage.
     * PUT/PATCH /keywords/{id}
     *
     * @param  int $id
     * @param UpdateKeywordAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKeywordAPIRequest $request)
    {
        $input = $request->all();

        /** @var Keyword $keyword */
        $keyword = $this->keywordRepository->findWithoutFail($id);

        if (empty($keyword)) {
            return $this->sendError('Keyword not found');
        }

        $keyword = $this->keywordRepository->update($input, $id);

        return $this->sendResponse($keyword->toArray(), 'Keyword updated successfully');
    }

    /**
     * Remove the specified Keyword from storage.
     * DELETE /keywords/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Keyword $keyword */
        $keyword = $this->keywordRepository->findWithoutFail($id);

        if (empty($keyword)) {
            return $this->sendError('Keyword not found');
        }

        $keyword->delete();

        return $this->sendResponse($id, 'Keyword deleted successfully');
    }
}
