<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Repositories\ArticleRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Category;
use App\Models\Article;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Image;

class ArticleController extends AppBaseController
{
    /** @var  ArticleRepository */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepository = $articleRepo;
    }

    /**
     * Display a listing of the Article.
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {

        $articles = Article::all();
        $keywords = Keyword::all();
        $categories = Category::all();
        return view('articles.index', compact('articles', 'keywords', 'categories'));
    }

    /**
     * Show the form for creating a new Article.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        $keywords = Keyword::all();
        return view('articles.create', compact('categories', 'keywords'));
    }

    /**
     * Store a newly created Article in storage.
     *
     * @param CreateArticleRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request, [
            'title' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'keywords' => 'required'
        ]);*/
        // Create a new article
        $new_article = new Article();

        // Initialisation of article
        $new_article->title = $request['title'];
        $new_article->content = $request['content'];
        $new_article->category_id = $request['category_id'];
        $new_article->user_id = Auth::user()->id;

        /** @var Image process */
        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        // set image path
        $thumb_destinationPath = public_path('/image/thumbDir/');
        $normal_destinationPath = public_path('/image/normalDir/');
        // image resize
        $thumb_img = Image::make($image->getRealPath())->resize(80, 40);
        
        if ($thumb_img->save($thumb_destinationPath.$filename, 80) && $image->move($normal_destinationPath, $filename)) {
            $new_article->thumb_img ='image/thumbDir/'.$filename;
            $new_article->normal_img = 'image/normalDir/'.$filename;
            $new_article->save();
            $keywords = $request['keywords'];
            $new_article->keywords()->sync($keywords);
        }

        $new_article->save();
        $keywords = $request['keywords'];
        $new_article->keywords()->sync($keywords);


    }

    /**
     * Display the specified Article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified Article.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Request $request,$id)
    {
        $article = Article::find($id);
        $keywords = Keyword::all();
        $article_keywords = $article->keywords;
        return view('articles.edit', compact('article', 'article_keywords', 'keywords'));
    }   
    /**
     * Update the specified Article in storage.
     *
     * @param  int              $id
     * @param UpdateArticleRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        
        $article              = Article::find($id);
        $article->title       = $request['title'];
        $article->category_id = $request['category_id'];
        $article->content     = $request['content'];

        if (request()->file('image') == '') {

            $article->save();
            
            $keywords = $request['keywords[]'];
            $article->keywords()->sync($keywords);
           
            return [
                'id'          => $article->id, 
                'title'       => $article->title, 
                'category_id' => $article->category_id, 
                'content'     => $article->content,
                'keywords[]'  => $article->keywords, 
                'thumb_img'   => $article->thumb_img, 
                'normal_img'  => $article->normal_img
            ];
            
        }   
        else {

            $this->validate( $request, [
                'image' => 'required'
            ]);
            
            $image = $request->file('image');
            $filename               = time().'.'.$image->getClientOriginalExtension();
            $thumb_destinationPath  = public_path('image/thumbDir');
            $normal_destinationPath = public_path('image/normalDir');
            $thumb_img = Image::make($image->getRealPath())->resize(80, 40);

            if ($thumb_img->save($thumb_destinationPath.'/'.$filename,80) && 
                $image->move($normal_destinationPath,$filename)) {

                unlink(public_path($article->thumb_img));
                unlink(public_path($article->normal_img));

                $article->thumb_img  = 'image/thumbDir/'.$filename;
                $article->normal_img = 'image/normalDir/'.$filename;

                $article->save();

                $keywords            = $request['keywords[]'];
                $article->keywords()->sync($keywords);

                return [
                    'id'          => $article->id, 
                    'title'       => $article->title, 
                    'category_id' => $article->category_id, 
                    'content'     => $article->content,
                    'keywords[]'  => $article->keywords, 
                    'thumb_img'   => $article->thumb_img, 
                    'normal_img'  => $article->normal_img
                ];
            
            }
        }

    }

    /**
     * Remove the specified Article from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $article = $this->articleRepository->findWithoutFail($id);

        if (empty($article)) {
            Flash::error('Article not found');

            return redirect(route('articles.index'));
        }

        $this->articleRepository->delete($id);
        
        Flash::success('Article deleted successfully.');

        return redirect(route('articles.index'));
    }
}
