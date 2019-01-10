FROM ruby:2.6.0

RUN apt-get update -qq && apt-get install -y nodejs postgresql-client
RUN mkdir /rails-tutorial
WORKDIR /rails-tutorial
COPY ./node_modules/@nathanfriend/rails-tutorial-hello-app/Gemfile /rails-tutorial/Gemfile
COPY ./node_modules/@nathanfriend/rails-tutorial-hello-app/Gemfile.lock /rails-tutorial/Gemfile.lock
RUN bundle install
COPY ./node_modules/@nathanfriend/rails-tutorial-hello-app /rails-tutorial

EXPOSE 3000

# Start the main process.
CMD ["rails", "server", "-b", "0.0.0.0"]