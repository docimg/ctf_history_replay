FROM python:alpine

RUN \
	pip install flask && \
	addgroup -S www-data && \
	adduser -S www-data -G www-data

COPY ./flag /flag
COPY ./app /app

USER www-data

CMD ["python", "/app/app.py"]
