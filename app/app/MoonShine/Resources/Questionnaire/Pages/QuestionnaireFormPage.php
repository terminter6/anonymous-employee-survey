<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Questionnaire\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Questionnaire\QuestionnaireResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use App\Models\QuestionnaireCategory;
use App\MoonShine\Resources\Question\QuestionResource;
use App\Models\Question;
use Throwable;
/**
 * @extends FormPage<QuestionnaireResource>
 */
class QuestionnaireFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Название', 'name')
                    ->required(),
                Select::make('Категория', 'category_id')
                    ->options(QuestionnaireCategory::all()->pluck('name', 'id')->toArray())
                    ->required(),
                HasMany::make('Вопросы', 'Questions', QuestionResource::class)->fields([
                    Text::make('Текст вопроса' , 'text'),
                    Select::make('Тип вопроса' , 'type')
                        ->options(Question::getTypes())
                        ->required(),
                ])->disableOutside()->creatable(),
            ]),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    protected function formButtons(): ListOf
    {
        return parent::formButtons();
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [];
    }

    /**
     * @param  FormBuilder  $component
     *
     * @return FormBuilder
     */
    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
    {
        return $component;
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
