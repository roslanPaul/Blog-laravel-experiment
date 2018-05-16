<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKeywordRequest;
use App\Http\Requests\UpdateKeywordRequest;
use App\Repositories\KeywordRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KeywordController extends AppBaseController
{
    /** @var  KeywordRepository */
    private $keywordRepository;

    public function __construct(KeywordRepository $keywordRepo)
    {
        $this->keywordRepository = $keywordRepo;
    }

    /**
     * Display a listing of the Keyword.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->keywordRepository->pushCriteria(new RequestCriteria($request));
        $keywords = $this->keywordRepository->all();

        return view('keywords.index')
            ->with('keywords', $keywords);
    }

    /**
     * Show the form for creating a new Keyword.
     *
     * @return Response
     */
    public function create()
    {
        return view('keywords.create');
    }

    /**
     * Store a newly created Keyword in storage.
     *
     * @param CreateKeywordRequest $request
     *
     * @return Response
     */
    public function store(CreateKeywordRequest $request)
    {
        $input = $request->all();

        $keyword = $this->keywordRepository->create($input);

        Flash::success('Keyword saved successfully.');

        return redirect(route('keywords.index'));
    }

    /**
     * Display the specified Keyword.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $keyword = $this->keywordRepository->findWithoutFail($id);

        if (empty($keyword)) {
            Flash::error('Keyword not found');

            return redirect(route('keywords.index'));
        }

        return view('keywords.show')->with('keyword', $keyword);
    }

    /**
     * Show the form for editing the specified Keyword.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $keyword = $this->keywordRepository->findWithoutFail($id);

        if (empty($keyword)) {
            Flash::error('Keyword not found');

            return redirect(route('keywords.index'));
        }

        return view('keywords.edit')->with('keyword', $keyword);
    }

    /**
     * Update the specified Keyword in storage.
     *
     * @param  int              $id
     * @param UpdateKeywordRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKeywordRequest $request)
    {
        $keyword = $this->keywordRepository->findWithoutFail($id);

        if (empty($keyword)) {
            Flash::error('Keyword not found');

            return redirect(route('keywords.index'));
        }

        $keyword = $this->keywordRepository->update($request->all(), $id);

        Flash::success('Keyword updated successfully.');

        return redirect(route('keywords.index'));
    }

    /**
     * Remove the specified Keyword from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $keyword = $this->keywordRepository->findWithoutFail($id);

        if (empty($keyword)) {
            Flash::error('Keyword not found');

            return redirect(route('keywords.index'));
        }

        $this->keywordRepository->delete($id);

        Flash::success('Keyword deleted successfully.');

        return redirect(route('keywords.index'));
    }
}
