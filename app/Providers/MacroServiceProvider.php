<?php

namespace App\Providers;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Inertia\Response as InertiaResponse;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        BelongsToMany::macro('current', function (callable $callaback = null) {
            if (in_array($this->relationName, ['plans', 'coupons'])) {
                return $this->when($callaback, $callaback, fn ($query) => $query->where('status', StatusEnum::ACTIVE()))->first();
            }

            throw new \Exception($this->relationName." does't have macroable");
        });

        Request::macro('hasTenant', function (): bool {
            $host = $this->getHost();
            $subdomains = explode('.', $host, -2);

            return count($subdomains) >= 1;
        });

        Blueprint::macro('commonFields', function () {
            $this->timestamps();
            $this->softDeletes();
            $this->foreignUuid('created_by')->nullable();
            $this->foreignUuid('updated_by')->nullable();
            $this->foreignUuid('deleted_by')->nullable();
        });

        InertiaResponse::macro('title', function ($title) {
            return $this->with('title', $title);
        });

        RedirectResponse::macro('success', function (string|array $message) {
            $this->with(['success' => $message]);

            return $this;
        });

        RedirectResponse::macro('info', function (string|array $message) {
            $this->with(['info' => $message]);

            return $this;
        });

        RedirectResponse::macro('warning', function (string|array $message) {
            $this->with(['warning' => $message]);

            return $this;
        });

        RedirectResponse::macro('error', function (string|array $message, $context = []) {
            if (! empty($context)) {
                Log::error($message, $context);
            }

            $this->with(['error' => $message]);

            return $this;
        });

        RedirectResponse::macro('print', function (string $url) {
            $this->with(['print' => $url]);

            return $this;
        });

        Builder::macro('whereLike', function ($attributes, string|null $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        Str::contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            if (count(explode('.', $attribute)) > 2) {
                                [$relationName_1, $relationName_2, $relationAttribute_1] = explode('.', $attribute);

                                $query->orWhereHas($relationName_1.'.'.$relationName_2, function (Builder $query) use ($relationAttribute_1, $searchTerm) {
                                    $query->where($relationAttribute_1, 'LIKE', "%{$searchTerm}%");
                                });
                            } else {
                                [$relationName, $relationAttribute] = explode('.', $attribute);

                                $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                    $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                                });
                            }
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });

            return $this;
        });
    }
}
