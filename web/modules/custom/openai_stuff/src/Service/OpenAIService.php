<?php

namespace Drupal\openai_stuff\Service;

use GuzzleHttp\Client;

/**
 * Service class for OpenAI integration.
 */
class OpenAIService {

  /**
   * The OpenAI API base URI.
   */
  const BASE_URI = 'https://api.openai.com/v1/';

  /**
   * The OpenAI API key.
   *
   * @var string
   */
  protected $apiKey;

  /**
   * The Guzzle HTTP client.
   *
   * @var \GuzzleHttp\Client
   */
  protected $client;

  /**
   * OpenAIService constructor.
   *
   * @param string $api_key
   *   The OpenAI API key.
   */
  public function __construct() {
    $this->apiKey = "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";
    $this->client = new Client([
      'base_uri' => self::BASE_URI,
      'headers' => [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . $this->apiKey,
      ],
    ]);
  }

  /**
   * Generates text using GPT-3.
   *
   * @param string $prompt
   *   The text prompt.
   * @param int $max_tokens
   *   The maximum number of tokens in the generated text.
   * @param float $temperature
   *   The temperature for controlling text randomness.
   *
   * @return string
   *   The generated text.
   */
  public function generateText($prompt, $max_tokens = 100, $temperature = 0.5) {
    $prefix = 'Create a less than 140 character summary of the following text, use a tone that provoke to continue reading the whole text: ';
    $response = $this->client->request('POST', 'engines/text-davinci-003/completions', [
      'json' => [
        'prompt' => $prefix . $prompt,
        'max_tokens' => $max_tokens,
        'temperature' => $temperature,
      ],
    ]);

    $generatedText = json_decode($response->getBody(), true)['choices'][0]['text'];

    return $generatedText;
  }

}
