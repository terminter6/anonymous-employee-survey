<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Questionnaire;

use Illuminate\Database\Eloquent\Model;
use App\Models\Questionnaire;
use App\MoonShine\Resources\Questionnaire\Pages\QuestionnaireIndexPage;
use App\MoonShine\Resources\Questionnaire\Pages\QuestionnaireFormPage;
use App\MoonShine\Resources\Questionnaire\Pages\QuestionnaireDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Questionnaire, QuestionnaireIndexPage, QuestionnaireFormPage, QuestionnaireDetailPage>
 */
class QuestionnaireResource extends ModelResource
{
    protected string $model = Questionnaire::class;

    protected string $title = 'Опросы';

    protected string $column = 'name';

    protected bool $detailInModal = true;
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            QuestionnaireIndexPage::class,
            QuestionnaireFormPage::class,
            QuestionnaireDetailPage::class,
        ];
    }
}
