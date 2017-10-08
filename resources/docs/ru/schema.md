# Schema

- [Описание](/schema#описание)
- [Получение данных](/schema#получение-данных)
- [Обновление данных](/schema#обновление-данных)

## Описание

Каждое GraphQL приложение требует описание схемы в обязательном порядке. 
Схема состоит обязательного поля `query` (запросы) и необязательного `mutation` (обновления), которые ссылаются 
на корневой [Object](/object) или [Input](/input).

```graphql
schema {
    query: RootQuery
    mutation: RootMutation
}
```

## Получение данных

Секция `query` отвечает за обработку запросов, которые просят сервер **отдать данные** в требуемом виде. 
Тип, на который ссылается поле `query` специфицирует все запросы клиента. В качестве значения `query` 
должен выступать тип [Object](/object) или тип [Input](/input).

```graphql
schema {
    query: RootQuery
}

type RootQuery {
    user: ExampleUser
    users: [ExampleUser]!
    article: ExampleArticle
    articles: [ExampleArticle]!
}
```

## Обновление данных

Секция `mutation` отвечает за обработку запросов, которые просят сервер **обновить данные**. 
Тип, на который ссылается поле `mutation` специфицирует все запросы клиента. В качестве значения `mutation` 
должен выступать тип [Object](/object) или тип [Input](/input).

```graphql
schema {
    # Аргумент query обязателен, но не участвует в нашем примере
    # query: RootQuery
    
    mutation: RootMutation
}

type RootMutation {
    updateUser(id: ID!, data: ExampleUser!): Boolean!
}
```
