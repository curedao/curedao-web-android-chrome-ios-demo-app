<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GithubRepositoryResource\Pages;
use App\Filament\Resources\GithubRepositoryResource\RelationManagers;
use App\Models\GithubRepository;
use Exception;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GithubRepositoryResource extends Resource
{
    protected static ?string $model = GithubRepository::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->required(),
                Forms\Components\Select::make('client_id')
                    ->relationship('client', 'client_id'),
                Forms\Components\TextInput::make('user_id')
                    ->required(),
                Forms\Components\TextInput::make('github_repository_id')
                    ->required(),
                Forms\Components\TextInput::make('node_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('private')
                    ->required(),
                Forms\Components\Textarea::make('owner')
                    ->required(),
                Forms\Components\TextInput::make('html_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255),
                Forms\Components\Toggle::make('fork')
                    ->required(),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('forks_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('keys_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('collaborators_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('teams_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('hooks_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('issue_events_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('events_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('assignees_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('branches_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tags_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('blobs_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('git_tags_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('git_refs_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('trees_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('statuses_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('languages_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('stargazers_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contributors_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subscribers_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subscription_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('commits_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('git_commits_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('comments_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('issue_comment_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contents_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('compare_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('merges_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('archive_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('downloads_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('issues_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pulls_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('milestones_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('notifications_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('labels_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('releases_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('deployments_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pushed_at')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('git_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ssh_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('clone_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('svn_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('homepage')
                    ->maxLength(255),
                Forms\Components\TextInput::make('size')
                    ->required(),
                Forms\Components\TextInput::make('stargazers_count')
                    ->required(),
                Forms\Components\TextInput::make('watchers_count')
                    ->required(),
                Forms\Components\TextInput::make('language')
                    ->maxLength(255),
                Forms\Components\Toggle::make('has_issues')
                    ->required(),
                Forms\Components\Toggle::make('has_projects')
                    ->required(),
                Forms\Components\Toggle::make('has_downloads')
                    ->required(),
                Forms\Components\Toggle::make('has_wiki')
                    ->required(),
                Forms\Components\Toggle::make('has_pages')
                    ->required(),
                Forms\Components\TextInput::make('forks_count')
                    ->required(),
                Forms\Components\Toggle::make('archived')
                    ->required(),
                Forms\Components\Toggle::make('disabled')
                    ->required(),
                Forms\Components\TextInput::make('open_issues_count')
                    ->required(),
                Forms\Components\Toggle::make('allow_forking')
                    ->required(),
                Forms\Components\Toggle::make('is_template')
                    ->required(),
                Forms\Components\Textarea::make('topics')
                    ->required(),
                Forms\Components\TextInput::make('visibility')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('forks')
                    ->required(),
                Forms\Components\TextInput::make('open_issues')
                    ->required(),
                Forms\Components\TextInput::make('watchers')
                    ->required(),
                Forms\Components\TextInput::make('default_branch')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('permissions')
                    ->required(),
                Forms\Components\Toggle::make('allow_squash_merge')
                    ->required(),
                Forms\Components\Toggle::make('allow_merge_commit')
                    ->required(),
                Forms\Components\Toggle::make('allow_rebase_merge')
                    ->required(),
                Forms\Components\Toggle::make('allow_auto_merge')
                    ->required(),
                Forms\Components\Toggle::make('delete_branch_on_merge')
                    ->required(),
                Forms\Components\TextInput::make('network_count')
                    ->required(),
                Forms\Components\TextInput::make('subscribers_count')
                    ->required(),
                Forms\Components\TextInput::make('mirror_url')
                    ->maxLength(255),
                Forms\Components\Textarea::make('license')
                    ->maxLength(65535),
                Forms\Components\Toggle::make('web_commit_signoff_required'),
            ]);
    }

    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('client.client_id'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('github_repository_id'),
                Tables\Columns\TextColumn::make('node_id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('full_name'),
                Tables\Columns\IconColumn::make('private')
                    ->boolean(),
                Tables\Columns\TextColumn::make('owner'),
                Tables\Columns\TextColumn::make('html_url'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\IconColumn::make('fork')
                    ->boolean(),
                Tables\Columns\TextColumn::make('url'),
                Tables\Columns\TextColumn::make('forks_url'),
                Tables\Columns\TextColumn::make('keys_url'),
                Tables\Columns\TextColumn::make('collaborators_url'),
                Tables\Columns\TextColumn::make('teams_url'),
                Tables\Columns\TextColumn::make('hooks_url'),
                Tables\Columns\TextColumn::make('issue_events_url'),
                Tables\Columns\TextColumn::make('events_url'),
                Tables\Columns\TextColumn::make('assignees_url'),
                Tables\Columns\TextColumn::make('branches_url'),
                Tables\Columns\TextColumn::make('tags_url'),
                Tables\Columns\TextColumn::make('blobs_url'),
                Tables\Columns\TextColumn::make('git_tags_url'),
                Tables\Columns\TextColumn::make('git_refs_url'),
                Tables\Columns\TextColumn::make('trees_url'),
                Tables\Columns\TextColumn::make('statuses_url'),
                Tables\Columns\TextColumn::make('languages_url'),
                Tables\Columns\TextColumn::make('stargazers_url'),
                Tables\Columns\TextColumn::make('contributors_url'),
                Tables\Columns\TextColumn::make('subscribers_url'),
                Tables\Columns\TextColumn::make('subscription_url'),
                Tables\Columns\TextColumn::make('commits_url'),
                Tables\Columns\TextColumn::make('git_commits_url'),
                Tables\Columns\TextColumn::make('comments_url'),
                Tables\Columns\TextColumn::make('issue_comment_url'),
                Tables\Columns\TextColumn::make('contents_url'),
                Tables\Columns\TextColumn::make('compare_url'),
                Tables\Columns\TextColumn::make('merges_url'),
                Tables\Columns\TextColumn::make('archive_url'),
                Tables\Columns\TextColumn::make('downloads_url'),
                Tables\Columns\TextColumn::make('issues_url'),
                Tables\Columns\TextColumn::make('pulls_url'),
                Tables\Columns\TextColumn::make('milestones_url'),
                Tables\Columns\TextColumn::make('notifications_url'),
                Tables\Columns\TextColumn::make('labels_url'),
                Tables\Columns\TextColumn::make('releases_url'),
                Tables\Columns\TextColumn::make('deployments_url'),
                Tables\Columns\TextColumn::make('pushed_at'),
                Tables\Columns\TextColumn::make('git_url'),
                Tables\Columns\TextColumn::make('ssh_url'),
                Tables\Columns\TextColumn::make('clone_url'),
                Tables\Columns\TextColumn::make('svn_url'),
                Tables\Columns\TextColumn::make('homepage'),
                Tables\Columns\TextColumn::make('size'),
                Tables\Columns\TextColumn::make('stargazers_count'),
                Tables\Columns\TextColumn::make('watchers_count'),
                Tables\Columns\TextColumn::make('language'),
                Tables\Columns\IconColumn::make('has_issues')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_projects')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_downloads')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_wiki')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_pages')
                    ->boolean(),
                Tables\Columns\TextColumn::make('forks_count'),
                Tables\Columns\IconColumn::make('archived')
                    ->boolean(),
                Tables\Columns\IconColumn::make('disabled')
                    ->boolean(),
                Tables\Columns\TextColumn::make('open_issues_count'),
                Tables\Columns\IconColumn::make('allow_forking')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_template')
                    ->boolean(),
                Tables\Columns\TextColumn::make('topics'),
                Tables\Columns\TextColumn::make('visibility'),
                Tables\Columns\TextColumn::make('forks'),
                Tables\Columns\TextColumn::make('open_issues'),
                Tables\Columns\TextColumn::make('watchers'),
                Tables\Columns\TextColumn::make('default_branch'),
                Tables\Columns\TextColumn::make('permissions'),
                Tables\Columns\IconColumn::make('allow_squash_merge')
                    ->boolean(),
                Tables\Columns\IconColumn::make('allow_merge_commit')
                    ->boolean(),
                Tables\Columns\IconColumn::make('allow_rebase_merge')
                    ->boolean(),
                Tables\Columns\IconColumn::make('allow_auto_merge')
                    ->boolean(),
                Tables\Columns\IconColumn::make('delete_branch_on_merge')
                    ->boolean(),
                Tables\Columns\TextColumn::make('network_count'),
                Tables\Columns\TextColumn::make('subscribers_count'),
                Tables\Columns\TextColumn::make('mirror_url'),
                Tables\Columns\TextColumn::make('license'),
                Tables\Columns\IconColumn::make('web_commit_signoff_required')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGithubRepositories::route('/'),
            'view' => Pages\ViewGithubRepository::route('/{record}'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}