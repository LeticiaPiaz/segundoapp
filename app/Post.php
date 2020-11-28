<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //return \App\Post::all();
    //select * from posts;

    //caso queira utilizar uma nomenclatura diferente para a tabela do banco de dados
    # proctected $table = 'db_postagens';
    protected $fillable = [
        'title',
        'description',
        'content',
        'slug',
        'is_active',
        'user_id'
    ];

    // criando uma função para especificar o relacionamento entre os models 'User' e 'Post'
    public function user(){
        return $this->belongsTo(User::class);
        // Supondo que vc utilize outro padrão de nomenclatura para o campo chave
        // estrangeria no banco de dados, precisará informar o nome do campo dentro 
        // da função para que o Laravel/Eloquent consigam localizar o campo na tabela do banco
        // return $this->belongsTo(User::class,'autor_id');
    }

    public function categories(){
        return $this->BelongsToMany(Category::class,'posts_categories');
    }
}
